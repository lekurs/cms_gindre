<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:47
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ShopTypeFactoryInterface;
use App\Domain\Models\ShopType;

class ShopTypeFactory implements ShopTypeFactoryInterface
{
    /**
     * @param string $shopType
     * @return ShopType
     * @throws \Exception
     */
    public function create(string $shopType): ShopType
    {
        return new ShopType($shopType);
    }
}
