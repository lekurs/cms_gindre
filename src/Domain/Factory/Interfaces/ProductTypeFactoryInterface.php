<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:50
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\ProductType;

interface ProductTypeFactoryInterface
{
    /**
     * @param string $type
     * @return ProductType
     */
    public function create(string $type): ProductType;
}
