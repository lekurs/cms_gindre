<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 10:18
 */

namespace App\Domain\DTO;


use App\Domain\Models\Role;

class ContactEditFormDTO
{
    /**
     * @var string
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
     * ContactEditFormDTO constructor.
     * @param string $id
     * @param string $name
     * @param string $lastName
     * @param int $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param Role $role
     * @param bool $main
     */
    public function __construct(string $id, string $name, string $lastName, int $phoneOne, int $phoneMobile, string $email, Role $role, bool $main)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->phoneOne = $phoneOne;
        $this->phoneMobile = $phoneMobile;
        $this->email = $email;
        $this->role = $role;
        $this->main = $main;
    }
}
