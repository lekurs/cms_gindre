<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 10:18
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\Role;
use Ramsey\Uuid\Uuid;

interface ContactEditFormDTOInterface
{
    /**
     * ContactEditFormDTOInterface constructor.
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
    );
}
