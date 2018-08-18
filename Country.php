<?php

namespace humanized\localehelpers;

use Locale;
use ResourceBundle;

class Country
{

    use LocaleHelperTrait;

    const labelFn = 'getDisplayRegion';
    const lookupPrefix = '-';

    protected static function _filterSystemLocale(&$locale)
    {
        if (strpos(substr($locale, -3), '_') != 0) {
            return false;
        }
        $locale = strtoupper(substr($locale, -2));
        return true;
    }

}
