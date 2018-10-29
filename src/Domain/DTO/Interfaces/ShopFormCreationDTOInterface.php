<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:43
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\StatusShop;

interface ShopFormCreationDTOInterface
{
    /**
     * ShopFormCreationDTOInterface constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param array $contact
     * @param StatusShop $status
     * @param bool $prospect
     * @param string|null $number
     */
//    public function __construct(
//        string $name,
//        string $address,
//        int $zip,
//        string $city,
//        array $contact,
//        StatusShop $status,
//        bool $prospect,
//        string $number = null
//    );
}
