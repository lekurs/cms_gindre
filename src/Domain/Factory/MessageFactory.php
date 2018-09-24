<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 17:48
 */

namespace App\Domain\Factory;


use App\Domain\Models\ContactType;
use App\Domain\Models\Message;
use App\Domain\Models\Shop;

class MessageFactory
{
    public function create(string $message, \DateTime $dateContact, ContactType $contactType, Shop $shop): Message
    {
        return new Message($message, $dateContact = new \DateTime(), $contactType, $shop);
    }
}