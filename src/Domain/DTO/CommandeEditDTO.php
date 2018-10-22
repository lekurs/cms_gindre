<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:11
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\CommandeEditDTOInterface;
use App\Domain\Models\ProductType;

class CommandeEditDTO implements CommandeEditDTOInterface
{
    /**
     * @var int
     */
    public $amount;

    /**
     * @var ProductType
     */
    public $productType;

    /**
     * CommandeEditDTO constructor.
     *
     * @param int $amount
     * @param ProductType $productType
     */
    public function __construct(int $amount, ProductType $productType)
    {
        $this->amount = $amount;
        $this->productType = $productType;
    }
}
