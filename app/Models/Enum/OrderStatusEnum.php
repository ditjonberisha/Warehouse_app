<?php

namespace App\Models\Enum;

abstract class OrderStatusEnum
{
    const OnStock = 0, BeingRepaired = 1, ToBeSold = 2, Sold = 3;
    static function getValue($number)
    {
        switch ($number)
        {
            case self::OnStock:
                return "On Stock";
            case self::BeingRepaired:
                return "Being Repaired";
            case self::ToBeSold:
                return "To Be Sold";
            case self::Sold: return "Sold";
            default: return "On Stock";
        }
    }
    static function getNumber($value)
    {
        switch ($value)
        {
            case "On Stock":
                return self::OnStock;
            case "Being Repaired":
                return self::BeingRepaired;
            case "To Be Sold":
                return self::ToBeSold;
            case "Sold":
                return self::Sold;
            default: return self::OnStock;
        }
    }
}
?>