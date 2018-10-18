<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 17:47
 */

namespace App\Domain\DTO\Interfaces;


interface ShopEditDTOInterface
{
    /**
     * ShopEditDTOInterface constructor.
     *
     * @param string $message
     * @param \DateTime $dateContact
     */
    public function __construct(string $message, \DateTime $dateContact);
}
