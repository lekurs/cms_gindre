<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:19
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

interface OrderCreationDTOInterface
{
    /**
     * OrderCreationDTOInterface constructor.
     *
     * @param \DateTime $dateOrder
     * @param Shop $shop
     * @param ProductType $productType
     * @param int $amount
     */
//    public function __construct(
//        \DateTime $dateOrder,
//        Shop $shop,
//        ProductType $productType,
//        int $amount
//    ) ;
}
