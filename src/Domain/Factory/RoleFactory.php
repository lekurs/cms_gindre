<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:23
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\RoleFactoryInterface;
use App\Domain\Models\Role;

class RoleFactory implements RoleFactoryInterface
{
    /**
     * @param string $role
     * @return Role
     * @throws \Exception
     */
    public function create(string $role): Role
    {
        return new Role($role);
    }
}
