<?php

namespace humanized\localehelpers;

/**
 * @link https://github.com/humanized/php-locale-helpers
 * @copyright Copyright (c) 2016 Humanized
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 */
use Locale as SystemLocale;
use ResourceBundle;

/**
 * This is the common trait class used in the helper classes defined in this package
 * 
 * It implements methods requiring the implementing class to define following class constants:
 * 
 * <table>
 * <tr><td>labelFn</td><td>The </td>
 * <tr><td></td><td></td>
 * </table>
 * 
 * @name PHP Locale Helpers common traits 
 * @version 1.0
 * @author Jeffrey Geyssens <jeffrey@humanized.be>
 * @package php-locale-helpers
 */
trait LocaleHelperTrait
{

    public static function all()
    {
        return array_merge(array_unique(array_map(['self', '_filterSystemLocale'],ResourceBundle::getLocales(''))));
    }

    public static function exists($lookup)
    {
        return in_array($lookup, self::all());
    }

    public static function label($lookup, $locale = null)
    {
        if (!self::exists($lookup)) {
            return null;
        }
        if (!isset($locale) && NULL !== SystemLocale::getDefault()) {
            $locale = SystemLocale::getDefault();
        }
        if (!isset($locale)) {
            $locale = 'en';
        }
        $labelFn = self::labelFn;
        return SystemLocale::$labelFn(self::lookupPrefix . $lookup, $locale);
    }

    public static function buildAssociativeArray($value = null, $keyFilterCondition = null)
    {
        $out = [];
        if (isset($keyFilterCondition) && !is_callable($keyFilterCondition)) {
            throw new Exception('keyFilterCondition must be a callable', '999');
        }
        foreach (self::all() as $key) {
            if ((isset($keyFilterCondition) ? $keyFilterCondition($key) : true) & $key!='') {
                $out[$key] = !isset($value) ? $key : (is_callable($value) ? $value($key) : $value);
            }
        }
        return array_unique($out);
    }

}
