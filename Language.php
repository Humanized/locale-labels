<?php

namespace humanized\localehelpers;

use Locale;
use ResourceBundle;

class Language
{

    use LocaleHelperTrait;

    const labelFn = 'getDisplayLanguage';

    protected function _filterSystemLocale($locale)
    {
        return strlen($locale) == 2;
    }

}
