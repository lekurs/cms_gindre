<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:56
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ContactCreationFormDTOInterface;
use App\Domain\Models\Role;

class ContactCreationFormDTO implements ContactCreationFormDTOInterface
{
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
     * ContactCreationFormDTO constructor.
     *
     * @param string $name
     * @param string $lastName
     * @param int $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param bool $main
     */
    public function __construct(string $name, string $lastName, int $phoneOne = null, int $phoneMobile, string $email, Role $role, bool $main = true)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->phoneOne = $phoneOne;
        $this->phoneMobile = $phoneMobile;
        $this->email = $email;
        $this->role = $role;
        $this->main = $main;
    }
}
