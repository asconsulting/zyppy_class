<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */


namespace ZyppyClass\EventListener;

use Contao\ArticleModel;
use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\FormModel;
use Contao\Model;
use Contao\ModuleModel;
use Contao\StringUtil;
use ZyppyClass\Resolver\ClassResolver;


/**
 * Applies the configured CSS classes BEFORE the element is constructed.
 *
 * The listeners this replaces ran on the getContentElement, getFrontendModule
 * and getForm hooks, which fire AFTER core has rendered the element. They threw
 * the rendered buffer away and called generate() a second time, so every
 * element rendered twice and a front end module inside a "module" content
 * element rendered four times - which turned one form submission into four
 * database rows on a live site.
 *
 * Controller::isVisibleElement() runs ahead of construction on every render
 * path, so writing the classes onto the model here means the FIRST render
 * already carries them and no re-render is needed.
 */
#[AsHook('isVisibleElement')]
class ApplyClassesListener
{
	public function __construct(private readonly ClassResolver $resolver)
	{
	}


	public function __invoke(Model $objElement, bool $blnReturn): bool
	{
		// Articles keep their own listener: the getArticle hook already fires
		// before construction, so it never re-rendered anything.
		if ($objElement instanceof ArticleModel)
		{
			return $blnReturn;
		}

		// A "module" content element renders the module rather than its own
		// template - see below - so the nested module has to be resolved here.
		$objNested = null;

		if ($objElement instanceof ContentModel && $objElement->type === 'module')
		{
			$objNested = ModuleModel::findByPk($objElement->module);

			// Preserved from GetContentElementListener: an Isotope checkout
			// wrapped in a "module" element was always left untouched.
			if ($objNested !== null && $objNested->type === 'iso_checkout')
			{
				return $blnReturn;
			}
		}

		$arrTokens = $this->resolver->resolve(
			$objElement->exclusiveClass,
			$objElement->commonClasses,
			$objElement->globalCommonClasses,
			$objElement->cssID
		);

		// Hybrid::generate() reads objParent->classes, not the form model's, so
		// a form placed as a content element or module only gets its own
		// configured classes if the wrapper carries them.
		if ($objElement->type === 'form' && $objElement->form)
		{
			$objForm = FormModel::findByPk((int) $objElement->form);

			if ($objForm !== null)
			{
				$arrTokens = array_merge($arrTokens, $this->resolver->resolve(
					$objForm->exclusiveClass,
					$objForm->commonClasses,
					$objForm->globalCommonClasses,
					// tl_form has no cssID column, so there is nothing to skip
					null
				));
			}
		}

		// Writing to the model marks it modified, which makes a fragment
		// reference carry the whole model instead of an id - so only write when
		// there is something to write.
		if (empty($arrTokens))
		{
			return $blnReturn;
		}

		// ContentModule::generate() forwards only cssID to the module it wraps
		// and never parses a template of its own, so classes set on the wrapper
		// would be dropped. Every other path honours $model->classes.
		if ($objNested !== null)
		{
			$arrCssId = StringUtil::deserialize($objElement->cssID, true);
			$arrCssId[0] = (string) ($arrCssId[0] ?? '');
			$arrCssId[1] = trim((string) ($arrCssId[1] ?? '') . ' ' . implode(' ', $arrTokens));

			$objElement->cssID = $arrCssId;

			return $blnReturn;
		}

		$arrExisting = \is_array($objElement->classes) ? $objElement->classes : array();
		$objElement->classes = array_values(array_unique(array_merge($arrExisting, $arrTokens)));

		return $blnReturn;
	}
}
