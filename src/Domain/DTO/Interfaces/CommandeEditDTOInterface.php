<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:11
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\ProductType;

interface CommandeEditDTOInterface
{
    /**
     * CommandeEditDTOInterface constructor.
     *
     * @param int $amount
     * @param ProductType $productType
     * @param int $number
     */
    public function __construct(
        int $amount,
        ProductType $productType,
        int $number
    );
}
