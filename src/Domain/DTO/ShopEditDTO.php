<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 17:47
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\ShopEditDTOInterface;

class ShopEditDTO implements ShopEditDTOInterface
{
    /**
     * @var string
     */
    public $message;

    /**
     * @var \DateTime
     */
    public $dateContact;

    /**
     * ShopEditDTO constructor.
     *
     * @param string $message
     * @param \DateTime $dateContact
     */
    public function __construct(string $message, \DateTime $dateContact)
    {
        $this->message = $message;
        $this->dateContact = $dateContact;
    }
}
