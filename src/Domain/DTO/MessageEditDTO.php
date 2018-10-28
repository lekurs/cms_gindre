<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 17:47
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\MessageEditDTOInterface;

class MessageEditDTO implements MessageEditDTOInterface
{
    /**
     * @var string
     */
    public $message;

    /**
     * MessageEditDTO constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }
}
