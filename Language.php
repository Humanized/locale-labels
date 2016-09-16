
<?php
namespace humanized/locale;

use Locale;

class Language
{
    public static function label($locale,$format){
    return Locale::locale_get_display_name($locale, $format);  
    }
}
?>

