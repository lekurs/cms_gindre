<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:09
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\ContactTypeFactoryInterface;
use App\Domain\Models\ContactType;

class ContactTypeFactory implements ContactTypeFactoryInterface
{
    /**
     * @param string $type
     * @return ContactType
     * @throws \Exception
     */
    public function create(string $type): ContactType
    {
        return new ContactType($type);
    }
}
