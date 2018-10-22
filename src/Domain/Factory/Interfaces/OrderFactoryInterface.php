<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:26
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Order;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

interface OrderFactoryInterface
{
    /**
     * @param Shop $shop
     * @param ProductType $productType
     * @param \DateTime $dateOrder
     * @param int $amount
     * @return Order
     */
    public function create(Shop $shop, ProductType $productType, \DateTime $dateOrder, int $amount): Order;
}
