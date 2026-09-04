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

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\FormModel;
use Contao\Template;
use ZyppyClass\Resolver\ClassResolver;


/**
 * Applies a form's own configured classes on the insert tag path.
 *
 * ApplyClassesListener covers every path that runs through
 * Controller::isVisibleElement(). Controller::getForm() does not - it goes
 * straight from FormModel::findByIdOrAlias() to the constructor - and it is
 * reachable through {{insert_form::x}}, its only caller in both 5.3 and 5.7.
 * Without this listener, deleting GetFormListener would silently stop applying
 * classes on that path.
 *
 * parseTemplate fires inside Template::parse(), which Hybrid::generate() calls
 * AFTER assigning Template->class, so appending here reaches the output.
 *
 * This listener is deliberately idempotent. A form placed as a content element
 * already receives its classes through the wrapper, and its template passes
 * through here as well - so tokens already present are skipped rather than
 * added twice.
 */
#[AsHook('parseTemplate')]
class ApplyFormClassesListener
{
	public function __construct(private readonly ClassResolver $resolver)
	{
	}


	public function __invoke(Template $objTemplate): void
	{
		if (!isset($objTemplate->formSubmit))
		{
			return;
		}

		$strFormSubmit = (string) $objTemplate->formSubmit;

		// Form::getFormId() builds this as 'auto_form_<id>', or 'auto_<formID>'
		// when the editor set a custom form ID
		if (!str_starts_with($strFormSubmit, 'auto_'))
		{
			return;
		}

		$objForm = $this->loadForm(substr($strFormSubmit, 5));

		if ($objForm === null)
		{
			return;
		}

		// tl_form has no cssID column, so there is nothing to skip here
		$arrTokens = $this->resolver->resolve(
			$objForm->exclusiveClass,
			$objForm->commonClasses,
			$objForm->globalCommonClasses,
			null
		);

		if (empty($arrTokens))
		{
			return;
		}

		$strClass = trim((string) $objTemplate->class);
		$arrExisting = $strClass === '' ? array() : preg_split('/\s+/', $strClass);
		$arrAdd = array_values(array_diff($arrTokens, $arrExisting ?: array()));

		if (empty($arrAdd))
		{
			return;
		}

		$objTemplate->class = trim($strClass . ' ' . implode(' ', $arrAdd));
	}


	private function loadForm(string $strKey): FormModel|null
	{
		if (preg_match('/^form_(\d+)$/', $strKey, $arrMatch))
		{
			return FormModel::findByPk((int) $arrMatch[1]);
		}

		return FormModel::findOneBy('formID', $strKey);
	}
}
