<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:18
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\CommandeCreationDTOInterface;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;

class CommandeCreationDTO implements CommandeCreationDTOInterface
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
     * @var int
     */
    public $number;

    /**
     * CommandeCreationDTO constructor.
     *
     * @param \DateTime $dateOrder
     * @param ProductType $productType
     * @param int $amount
     * @param int $number
     */
    public function __construct(
        \DateTime $dateOrder,
        ProductType $productType,
        int $amount,
        int $number
    ) {
        $this->dateOrder = $dateOrder;
        $this->productType = $productType;
        $this->amount = $amount;
        $this->number = $number;
    }
}
