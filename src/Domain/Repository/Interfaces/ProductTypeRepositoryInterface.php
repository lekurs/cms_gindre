<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:19
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\ProductType;

interface ProductTypeRepositoryInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param ProductType $productType
     */
    public function save(ProductType $productType): void;
}
