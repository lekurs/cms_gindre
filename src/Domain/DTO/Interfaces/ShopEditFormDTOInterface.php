<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:27
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\StatusShop;

interface ShopEditFormDTOInterface
{
    /**
     * ShopEditFormDTOInterface constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param string $number
     * @param bool $prospect
     * @param StatusShop $statusShop
     * @param string $slug
     */
    public function __construct(
        string $name,
        string $address,
        int $zip,
        string $city,
        string $number,
        bool $prospect,
        StatusShop $statusShop,
        string $slug
    );
}
