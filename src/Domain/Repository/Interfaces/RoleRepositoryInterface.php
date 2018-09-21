<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:19
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Role;

interface RoleRepositoryInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param Role $role
     */
    public function save(Role $role): void;
}