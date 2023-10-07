<?php

namespace App\Doctrine\DBAL\Type;

use App\Entity\Shop\Product\ProductTypeEnum;

class ProductType extends AbstractEnumType
{
    public const NAME = 'productType';

    public static function getEnumsClass(): string
    {
        return ProductTypeEnum::class;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}