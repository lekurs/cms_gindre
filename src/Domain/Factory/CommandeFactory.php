<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:26
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\CommandeFactoryInterface;
use App\Domain\Models\Commande;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

class CommandeFactory implements CommandeFactoryInterface
{
    /**
     * @param Shop $shop
     * @param ProductType $productType
     * @param \DateTime $dateOrder
     * @param int $amount
     * @return Commande
     * @throws \Exception
     */
    public function create(Shop $shop, ProductType $productType, \DateTime $dateOrder, int $amount, int $number): Commande
    {
        return new Commande($shop, $productType, $dateOrder, $amount, $number);
    }
}
