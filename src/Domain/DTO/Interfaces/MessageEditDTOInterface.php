<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 17:47
 */

namespace App\Domain\DTO\Interfaces;


interface MessageEditDTOInterface
{
    /**
     * MessageEditDTOInterface constructor.
     *
     * @param string $message
     */
    public function __construct(string $message);
}
