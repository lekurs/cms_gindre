<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 17:58
 */

namespace App\Domain\Models;


use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

class Shop
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var int
     */
    private $zip;

    /**
     * @var string
     */
    private $city;

    /**
     * @var array
     */
    private $contacts;

    /**
     * @var Region
     */
    private $region;

    /**
     * @var string
     */
    private $number;

    /**
     * @var
     */
    private $status;

    /**
     * @var bool
     */
    private $prospect;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \ArrayAccess
     */
    private $messages;

    /**
     * @var \ArrayAccess
     */
    private $orders;

    /**
     * Shop constructor.
     *
     * @param string $name
     * @param string $address
     * @param int $zip
     * @param string $city
     * @param array $contacts
     * @param Region $region
     * @param StatusShop $status
     * @param bool $prospect
     * @param string|null $number
     * @param string $slug
     * @throws \Exception
     */
    public function __construct(string $name, string $address, int $zip, string $city, array $contacts, Region $region, StatusShop $status, bool $prospect = true, string $number = null, string $slug)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->contacts = new ArrayCollection($contacts ?? []);
        $this->region = $region;
        $this->status = $status;
        $this->prospect = $prospect;
        $this->number = $number;
        $this->slug = $slug;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return \ArrayAccess
     */
    public function getContacts(): \ArrayAccess
    {
        return $this->contacts;
    }

    /**
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return \ArrayAccess
     */
    public function getMessages(): \ArrayAccess
    {
        return $this->messages;
    }

    /**
     * @return \ArrayAccess
     */
    public function getOrders(): \ArrayAccess
    {
        return $this->orders;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isProspect(): bool
    {
        return $this->prospect;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
