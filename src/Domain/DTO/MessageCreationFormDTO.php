<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 17:52
 */

namespace App\Domain\DTO;


use App\Domain\Models\ContactType;
use App\Domain\Models\Shop;

class MessageCreationFormDTO
{
    /**
     * @var string
     */
    public $message;

    /**
     * @var ContactType
     */
    public $contactType;

    /**
     * @var Shop
     */
    public $shop;

    /**
     * MessageCreationFormDTO constructor.
     *
     * @param string $message
     * @param ContactType $contactType
     * @param Shop $shop
     */
    public function __construct(string $message, ContactType $contactType)
    {
        $this->message = $message;
        $this->contactType = $contactType;
//        $this->shop = $shop;
    }
}
