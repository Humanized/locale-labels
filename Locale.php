<?php

namespace humanized\localehelpers;

use Locale as NativeLocale;
use ResourceBundle;

class Locale
{

    use LocaleHelperTrait;

    const labelFn = 'getDisplayLanguage';

    public function _filterSystemLocale($locale)
    {
        return true;
    }

}
