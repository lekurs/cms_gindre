<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:10
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\ContactType;

interface ContactTypeFactoryInterface
{
    /**
     * @param string $type
     * @return ContactType
     */
    public function create(string $type): ContactType;
}
