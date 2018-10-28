<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 10:18
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ContactEditFormDTOInterface;
use App\Domain\Models\Role;
use Ramsey\Uuid\Uuid;

class ContactEditFormDTO implements ContactEditFormDTOInterface
{
    /**
     * @var Uuid
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var int
     */
    public $phoneOne;

    /**
     * @var int
     */
    public $phoneMobile;

    /**
     * @var string
     */
    public $email;

    /**
     * @var Role
     */
    public $role;

    /**
     * @var bool
     */
    public $main;

    /**
     * @var string
     */
    public $slug;

    /**
     * ContactEditFormDTO constructor.
     *
     * @param Uuid $id
     * @param string $name
     * @param string $lastName
     * @param int|null $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param Role $role
     * @param bool $main
     * @param string $slug
     */
    public function __construct(
        Uuid $id,
        string $name,
        string $lastName,
        int $phoneOne = null,
        int $phoneMobile,
        string $email,
        Role $role,
        bool $main,
        string $slug
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->phoneOne = $phoneOne;
        $this->phoneMobile = $phoneMobile;
        $this->email = $email;
        $this->role = $role;
        $this->main = $main;
        $this->slug = $slug;
    }
}
