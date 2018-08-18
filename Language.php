<?php

namespace humanized\localehelpers;

use Locale;
use ResourceBundle;

class Language
{

    use LocaleHelperTrait;

    const lookupPrefix = '';
    const labelFn = 'getDisplayLanguage';

    protected static function _filterSystemLocale($locale)
    {
        return strlen($locale) == 2;
    }

}
