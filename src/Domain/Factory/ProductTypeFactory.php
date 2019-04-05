<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:50
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ProductTypeFactoryInterface;
use App\Domain\Models\ProductType;

class ProductTypeFactory implements ProductTypeFactoryInterface
{
    /**
     * @param string $type
     * @return ProductType
     * @throws \Exception
     */
    public function create(string $type): ProductType
    {
        return new ProductType($type);
    }
}
