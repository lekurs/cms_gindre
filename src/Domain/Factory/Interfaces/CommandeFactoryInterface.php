<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:26
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Commande;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

interface CommandeFactoryInterface
{
    /**
     * @param Shop $shop
     * @param ProductType $productType
     * @param \DateTime $dateOrder
     * @param int $amount
     * @param int $number
     * @return Commande
     */
    public function create(Shop $shop, ProductType $productType, \DateTime $dateOrder, int $amount, int $number): Commande;
}
