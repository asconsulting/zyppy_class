<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */


namespace ZyppyClass\Resolver;

use Contao\StringUtil;


/**
 * Merges an element's configured CSS classes into one ordered token list.
 *
 * The stored values ARE the CSS tokens - the Settings vocabularies only
 * constrain what an editor may pick in the back end, so nothing is looked up
 * here. This replaces the merge block that was copy-pasted into each of the
 * render-time listeners.
 */
class ClassResolver
{
	/**
	 * @return array<string>
	 */
	public function resolve(string|null $strExclusive, mixed $varCommon, mixed $varGlobal, mixed $varCssId): array
	{
		$arrRaw = array((string) $strExclusive);

		foreach (array($varCommon, $varGlobal) as $varField)
		{
			foreach (StringUtil::deserialize($varField, true) as $strValue)
			{
				$arrRaw[] = (string) $strValue;
			}
		}

		// Classes the editor typed into cssID are emitted by core already
		$arrCssId = StringUtil::deserialize($varCssId, true);
		$arrSkip = $this->split((string) ($arrCssId[1] ?? ''));

		$arrTokens = array();

		foreach ($arrRaw as $strValue)
		{
			foreach ($this->split($strValue) as $strToken)
			{
				if (!\in_array($strToken, $arrTokens, true) && !\in_array($strToken, $arrSkip, true))
				{
					$arrTokens[] = $strToken;
				}
			}
		}

		return $arrTokens;
	}


	/**
	 * @return array<string>
	 */
	private function split(string $strValue): array
	{
		$strValue = trim($strValue);

		if ($strValue === '')
		{
			return array();
		}

		return array_values(array_filter(preg_split('/\s+/', $strValue) ?: array(), static fn ($s) => $s !== ''));
	}
}
