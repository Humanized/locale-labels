<?php

namespace humanized\localehelpers;

/**
 * @link https://github.com/humanized/php-locale-helpers
 * @copyright Copyright (c) 2016 Humanized
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 */
use Locale;

/**
 * This is the common trait class used in the helper classes defined in this package
 * 
 * It implements methods requiring the parent class to implement following static methods:
 * 
 * <table>
 * <tr><td>available()</td><td>List of available values for the </td>
 * <tr><td>_lookup($lookup,$locale)</td><td></td>
 * </table>
 * 
 * @name PHP Locale Helpers common traits 
 * @version 1.0
 * @author Jeffrey Geyssens <jeffrey@humanized.be>
 * @package php-locale-helpers
 */
trait LocaleHelperTrait
{

    public static function exists($lookup)
    {
        return in_array($lookup, self::all());
    }

    public static function label($lookup, $locale = Locale::DEFAULT_LOCALE)
    {
        if (!isset($locale)) {
            $locale = 'en';
        }
        if (!self::exists($lookup)) {
            return null;
        }
        return self::_lookup($lookup, $locale);
    }

    public static function filter($fn)
    {
        $out = [];

        foreach (self::all() as $value) {
            if ($fn($value)) {
                $out[] = $value;
            }
        }
        return $out;
    }

    public static function buildAssociativeArray($value = null, $keyFilterCondition = null)
    {
        $out = [];
        if (isset($keyFilterCondition) && !is_callable($keyFilterCondition)) {
            throw new Exception('keyFilterCondition must be a callable', '999');
        }
        foreach (self::all() as $key) {
            if ((isset($keyFilterCondition) ? $keyFilterCondition($key) : true)) {
                $out[$key] = !isset($value) ? $key : (is_callable($value) ? $value($key) : $value);
            }
        }
        return $out;
    }

}
