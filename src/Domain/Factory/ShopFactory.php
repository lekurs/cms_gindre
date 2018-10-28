<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:45
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ShopFactoryInterface;
use App\Domain\Models\Contact;
use App\Domain\Models\Departement;
use App\Domain\Models\Region;
use App\Domain\Models\Shop;
use App\Domain\Models\StatusShop;

class ShopFactory implements ShopFactoryInterface
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
     * @throws \Exception
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
    ): Shop
    {
        return new Shop($name, $address, $zip, $city, $contact, $region, $departement, $statutShop, $prospect, $number, $slug);
    }
}
