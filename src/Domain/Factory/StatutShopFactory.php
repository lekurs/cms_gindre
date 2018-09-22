<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:45
 */

namespace App\Domain\Factory;


use App\Domain\DTO\Interfaces\StatutShopFactoryInterface;
use App\Domain\Models\StatusShop;

class StatutShopFactory implements StatutShopFactoryInterface
{
    /**
     * @param string $statut
     * @return StatusShop
     * @throws \Exception
     */
    public function create(string $statut): StatusShop
    {
        return new StatusShop($statut);
    }
}