<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:26
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\OrderFactoryInterface;
use App\Domain\Models\Order;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

class OrderFactory implements OrderFactoryInterface
{
    /**
     * @param Shop $shop
     * @param ProductType $productType
     * @param \DateTime $dateOrder
     * @param int $amount
     * @return Order
     * @throws \Exception
     */
    public function create(Shop $shop, ProductType $productType, \DateTime $dateOrder, int $amount): Order
    {
        return new Order($shop, $productType, $dateOrder, $amount);
    }
}
