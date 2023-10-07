<?php

namespace App\Entity\Shop\Product;

use UnitEnum;

enum ProductTypeEnum: string
{
    case DELIVERABLE = 'deliverable';
    case DOWNLOADABLE = 'downloadable';

    public function isShippable(?self $value): bool
    {
        return match ($value) {
             self::DELIVERABLE, self::DELIVERABLE => true,
             self::DOWNLOADABLE, null => false,
        };
    }

    public static function getCases(): array
    {
        $cases = self::cases();
        return array_map(static fn(UnitEnum $case) => $case->name, $cases);
    }

    public static function getValues(): array
    {
        $cases = self::cases();
        return array_map(static fn(UnitEnum $case) => $case->value, $cases);
    }
}