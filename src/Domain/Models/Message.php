<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:11
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Message
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $dateContact;

    /**
     * @var ContactType
     */
    private $contactType;

    /**
     * @var Shop
     */
    private $shop;

    /**
     * Message constructor.
     *
     * @param string $message
     * @param \DateTime $dateContact
     * @param ContactType $contactType
     * @throws \Exception
     */
    public function __construct(string $message, \DateTime $dateContact, ContactType $contactType, Shop $shop)
    {
        $this->id = Uuid::uuid4();
        $this->message = $message;
        $this->dateContact = $dateContact;
        $this->contactType = $contactType;
        $this->shop = $shop;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return \DateTime
     */
    public function getDateContact(): \DateTime
    {
        return $this->dateContact;
    }

    /**
     * @return ContactType
     */
    public function getContactType(): ContactType
    {
        return $this->contactType;
    }
}
