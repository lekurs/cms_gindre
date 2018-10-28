<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:45
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Departement;
use App\Domain\Models\Region;
use App\Domain\Models\Shop;
use App\Domain\Models\StatusShop;

interface ShopFactoryInterface
{
    /**
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param array $contact
     * @param Region $region
     * @param Departement $departement
     * @param StatusShop $statutShop
     * @param bool $prospect
     * @param string|null $number
     * @param string $slug
     * @return Shop
     */
    public function create(
        string $name,
        string $address,
        int $zip,
        string $city,
        array $contact,
        Region $region,
        Departement $departement,
        StatusShop $statutShop,
        bool $prospect = true,
        string $number = null,
        string $slug
    ): Shop;
}
