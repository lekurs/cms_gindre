<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:18
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\ContactType;

interface ContactTypeRepositoryInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param ContactType $contactType
     */
    public function save(ContactType $contactType): void;
}
