<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:45
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\StatusShop;

interface StatutShopFactoryInterface
{
    /**
     * @param string $statut
     * @return StatusShop
     */
    public function create(string $statut): StatusShop;
}