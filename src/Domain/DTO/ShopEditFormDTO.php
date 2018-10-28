<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:27
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ShopEditFormDTOInterface;
use App\Domain\Models\StatusShop;

class ShopEditFormDTO implements ShopEditFormDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $address;

    /**
     * @var int
     */
    public $zip;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $number;

    /**
     * @var bool
     */
    public $prospect;

    /**
     * @var StatusShop
     */
    public $status;

    /**
     * @var string
     */
    public $slug;

    /**
     * ShopEditFormDTO constructor.
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
        ?string $number,
        bool $prospect,
        StatusShop $statusShop,
        string $slug
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->number = $number;
        $this->prospect = $prospect;
        $this->status = $statusShop;
        $this->slug = $slug;
    }
}
