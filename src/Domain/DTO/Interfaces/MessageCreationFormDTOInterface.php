<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 17:52
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\Models\ContactType;

interface MessageCreationFormDTOInterface
{
    /**
     * MessageCreationFormDTOInterface constructor.
     *
     * @param string $message
     * @param ContactType $contactType
     */
    public function __construct(string $message, ContactType $contactType);
}
