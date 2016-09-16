<?php

namespace humanized\locale;

use Locale;
use ResourceBundle;

class Language
{

    use LocaleHelperTrait;

    public static function available()
    {
        return ResourceBundle::getLocales('');
    }

    public static function _lookup($locale, $format)
    {
        return Locale::getDisplayLanguage($locale, $format);
    }

    public static function localised_label($lookup)
    {
        return self::label($lookup);
    }

    public static function native_label($lookup)
    {
        return self::label($lookup, $lookup);
    }

}
