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
use App\Domain\Models\Region;
use App\Domain\Models\Shop;

class ShopFactory implements ShopFactoryInterface
{
    public function create(string $name, string $address, int $zip, string $city, array $contact, Region $region, string $number = null, string $slug): Shop
    {
        return new Shop($name, $address, $zip, $city, $contact, $region, $number, $slug);
    }
}
