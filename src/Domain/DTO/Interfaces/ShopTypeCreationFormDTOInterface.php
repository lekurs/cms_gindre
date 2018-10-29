<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:49
 */

namespace App\Domain\DTO\Interfaces;


interface ShopTypeCreationFormDTOInterface
{
    /**
     * ShopTypeCreationFormDTOInterface constructor.
     *
     * @param string $shopType
     */
    public function __construct(string $shopType);
}
