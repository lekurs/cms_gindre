<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:42
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\CreationShopFormDTOInterface;
use App\Domain\Models\Region;
use App\Domain\Models\StatusShop;

class CreationShopFormDTO implements CreationShopFormDTOInterface
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
     * @var StatusShop
     */
    public $status;

    /**
     * @var bool
     */
    public $prospect;

    /**
     * @var array
     */
    public $contact;

    /**
     * @var Region
     */
    public $region;

    /**
     * @var string
     */
    public $number;

    /**
     * CreationShopFormDTO constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param array $contact
     * @param StatusShop $status
     * @param bool $prospect
     * @param string|null $number
     */
    public function __construct(string $name, string $address, int $zip, string $city, array $contact, StatusShop $status, bool $prospect, string $number = null)
    {
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->contact = [];
        $this->status = $status;
        $this->prospect = $prospect;
        $this->number = $number;
    }
}
