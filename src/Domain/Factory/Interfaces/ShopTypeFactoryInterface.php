<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:47
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\ShopType;

interface ShopTypeFactoryInterface
{
    /**
     * @param string $shopType
     * @return ShopType
     */
    public function create(string $shopType): ShopType;
}
