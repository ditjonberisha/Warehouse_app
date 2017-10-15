<?php

namespace App\Models\Enum;

class PhoneConditionEnum
{
    const neww = 0, opened = 1, brokenFixable = 2, brokenUnfixable = 3;

    static function getValue($number)
    {
        switch ($number)
        {
            case self::neww:
                return "new";
            case self::opened:
                return "opened";
            case self::brokenFixable:
                return "broken fixable";
            case self::brokenUnfixable:
                return "broken unfixable";
            default: return "new";
        }
    }

    static function getNumber($value)
    {
        switch ($value)
        {
            case "new":
                return self::neww;
            case "opened":
                return self::opened;
            case "broken fixable":
                return self::brokenFixable;
            case "broken unfixable":
                return self::brokenUnfixable;
            default: return self::neww;
        }
    }
}
?>