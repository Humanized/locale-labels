<?php

namespace humanized\localehelpers;

use Locale;
use ResourceBundle;

class Country
{

    use LocaleHelperTrait;

    public static function all()
    {
        $out = [];
        foreach (ResourceBundle::getLocales('') as $locale) {
            $candidate = null;
            $last_ = strripos($locale, '_');
            if ($last_) {
                $candidate = substr($locale, $last_ + 1);
            }
            if (strlen($candidate) == 2) {
                $out[] = $candidate;
            }
        }
        sort($out);
        return array_merge(array_unique($out));
    }

    public static function _lookup($code, $locale)
    {
        return Locale::getDisplayRegion('-' . strtoupper($code), $locale);
    }

}
