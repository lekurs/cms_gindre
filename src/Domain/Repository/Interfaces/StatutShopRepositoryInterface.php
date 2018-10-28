<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:33
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\StatusShop;

interface StatutShopRepositoryInterface
{
    /**
     * @param StatusShop $statutShop
     */
    public function save(StatusShop $statutShop): void;
}
