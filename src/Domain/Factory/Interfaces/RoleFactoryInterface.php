<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:23
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Role;

interface RoleFactoryInterface
{
    /**
     * @param string $role
     * @return Role
     */
    public function create(string $role): Role;
}