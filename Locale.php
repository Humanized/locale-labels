<?php

namespace humanized\localehelpers;

use Locale as NativeLocale;
use ResourceBundle;

class Locale
{

    use LocaleHelperTrait;

    public static function all()
    {
        return ResourceBundle::getLocales('');
    }

    public static function _lookup($locale, $format)
    {
        return NativeLocale::getDisplayLanguage($locale, $format);
    }

    public static function localised_label($lookup)
    {
        return self::label($lookup);
    }

    public static function native_label($lookup)
    {
        return self::label($lookup, $lookup);
    }

    /**
     * 
     * @return type
     */
    public static function primary()
    {
        return self::filter(['humanized\localehelpers\Language', 'filterPrimaryLocales']);
    }

    public static function primaryExists($lookup)
    {
        return in_array($lookup, self::primary());
    }

    public static function buildPrimaryAssociativeArray($value = 0)
    {
        return self::buildAssociativeArray($value, ['humanized\localehelpers\Language', 'filterPrimaryLocales']);
    }

    public static function filterPrimaryLocales($locale)
    {
        return strlen($locale) == 2;
    }

}
