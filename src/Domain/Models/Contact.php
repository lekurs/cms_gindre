<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 08:23
 */

namespace App\Domain\Models;


use App\Domain\DTO\ContactEditFormDTO;
use Ramsey\Uuid\Uuid;

class Contact
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
    private $lastName;

    /**
     * @var int
     */
    private $phoneOne;

    /**
     * @var int
     */
    private $phoneMobile;

    /**
     * @var string
     */
    private $email;

    /**
     * @var Role
     */
    private $role;

    /**
     * @var bool
     */
    private $main;

    /**
     * @var Shop
     */
    private $shop;

    /**
     * @var string
     */
    private $slug;

    /**
     * Contact constructor.
     *
     * @param string $name
     * @param string $lastName
     * @param int $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param Role $role
     * @param bool $main
     * @param Shop $shop
     * @param string $slug
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $lastName,
        int $phoneOne = null,
        int $phoneMobile,
        string $email,
        Role $role,
        bool $main = true,
        string $slug,
        Shop $shop = null
    ) {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->lastName = $lastName;
        $this->phoneOne = $phoneOne;
        $this->phoneMobile = $phoneMobile;
        $this->email = $email;
        $this->role = $role;
        $this->main = $main;
        $this->slug = $slug;
        $this->shop = $shop;
    }

    /**
     * @return Uuid
     */
    public function getId()
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
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getPhoneOne()
    {
        if ($this->phoneOne != null) {
            return $this->phoneOne;
        }
    }

    /**
     * @return int
     */
    public function getPhoneMobile(): int
    {
        return $this->phoneMobile;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return bool
     */
    public function isMain(): bool
    {
        return $this->main;
    }

    public function manageShop(Shop $shop): void
    {
        $this->shop = $shop;
    }

    public function updateContact(ContactEditFormDTO $DTO): void
    {
        $this->name = $DTO->name;
        $this->lastName = $DTO->lastName;
        $this->phoneOne = $DTO->phoneOne;
        $this->phoneMobile = $DTO->phoneMobile;
        $this->email = $DTO->email;
        $this->role = $DTO->role;
        $this->main = $DTO->main;
        $this->slug = $DTO->slug;
    }
}
