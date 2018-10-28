<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:56
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Role;

interface ContactCreationFormDTOInterface
{
    /**
     * ContactCreationFormDTOInterface constructor.
     *
     * @param string $name
     * @param string $lastName
     * @param int|null $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param Role $role
     * @param bool $main
     */
    public function __construct(
        string $name,
        string $lastName,
        int $phoneOne = null,
        int $phoneMobile,
        string $email,
        Role $role,
        bool $main = true
    );
}
