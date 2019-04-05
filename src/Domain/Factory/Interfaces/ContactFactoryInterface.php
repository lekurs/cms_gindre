<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 14:28
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\Contact;
use App\Domain\Models\Role;
use App\Domain\Models\Shop;

interface ContactFactoryInterface
{
    /**
     * @param string $name
     * @param string $lastName
     * @param int $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param Role $role
     * @param bool $main
     * @param string $slug
     * @param Shop|null $shop
     * @return Contact
     */
    public function create(
        string $name,
        string $lastName,
        int $phoneOne,
        int $phoneMobile,
        string $email,
        Role $role,
        bool $main,
        string $slug,
        Shop $shop = null
    ): Contact;
}
