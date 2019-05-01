<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:49
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ShopTypeCreationFormDTOInterface;

class ShopTypeCreationFormDTO implements ShopTypeCreationFormDTOInterface
{
    /**
     * @var string
     */
    public $shopType;

    /**
     * ShopTypeCreationFormDTO constructor.
     *
     * @param string $shopType
     */
    public function __construct(string $shopType)
    {
        $this->shopType = $shopType;
    }
}