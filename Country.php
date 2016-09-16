
<?php

namespace humanized\localelabels;

use Locale;

class Country
{

    public static function available()
    {
        
    }

    public static function exists($code)
    {
        
    }

    public static function label($code, $locale = \Locale::DEFAULT_LOCALE)
    {
        return Locale::getDisplayRegion('-' . $code, $locale);
    }

}
