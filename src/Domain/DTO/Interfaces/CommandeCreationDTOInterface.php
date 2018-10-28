<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:19
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\ProductType;

interface CommandeCreationDTOInterface
{
    /**
     * CommandeCreationDTOInterface constructor.
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
    );
}
