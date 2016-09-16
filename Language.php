<?php

namespace humanized\locale;

use Locale;
use ResourceBundle;

class Language
{

    public static function available()
    {
        return ResourceBundle::getLocales('');
    }

    public static function exists($locale)
    {
        return in_array($locale, self::available());
    }

    public static function localised_label($locale)
    {
        return self::label($locale);
    }

    public static function native_label($locale)
    {
        return self::label($locale, $locale);
    }

    public static function label($locale, $format = \Locale::DEFAULT_LOCALE)
    {
        if (!self::exists($locale)) {
            return null;
        }
        return Locale::locale_get_display_name($locale, $format);
    }

}
