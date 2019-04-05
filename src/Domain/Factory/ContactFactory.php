<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 14:27
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ContactFactoryInterface;
use App\Domain\Models\Contact;
use App\Domain\Models\Role;
use App\Domain\Models\Shop;

class ContactFactory implements ContactFactoryInterface
{
    /**
     * @param string $name
     * @param string $lastName
     * @param int $phoneOne
     * @param int $phoneMobile
     * @param string $email
     * @param Role $role
     * @param bool $main
     * @param Shop $shop
     * @param string $slug
     * @return Contact
     * @throws \Exception
     */
    public function create(
        string $name,
        string $lastName,
        int $phoneOne = null,
        int $phoneMobile,
        string $email,
        Role $role,
        bool $main,
        string $slug,
        Shop $shop = null
    ): Contact
    {
        return new Contact($name, $lastName, $phoneOne, $phoneMobile, $email, $role, $main, $slug, $shop);
    }
}
