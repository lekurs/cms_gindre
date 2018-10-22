<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:18
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\OrderCreationDTOInterface;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

class OrderCreationDTO implements OrderCreationDTOInterface
{
    /**
     * @var \DateTime
     */
    public $dateOrder;

    /**
     * @var Shop
     */
    public $shop;

    /**
     * @var ProductType
     */
    public $productType;

    /**
     * @var int
     */
    public $amount;

    /**
     * OrderCreationDTO constructor.
     *
     * @param \DateTime $dateOrder
     * @param Shop $shop
     * @param ProductType $productType
     * @param int $amount
     */
    public function __construct(
        \DateTime $dateOrder,
//        Shop $shop,
        ProductType $productType,
        int $amount
    ) {
        $this->dateOrder = $dateOrder;
//        $this->shop = $shop;
        $this->productType = $productType;
        $this->amount = $amount;
    }
}
