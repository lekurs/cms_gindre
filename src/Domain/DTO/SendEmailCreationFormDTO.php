<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-11
 * Time: 13:52
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\SendEmailCreationFormDTOInterface;

class SendEmailCreationFormDTO implements SendEmailCreationFormDTOInterface
{

    /**
     * @var string
     */
    public $to;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $file;

    /**
     * SendEmailCreationFormDTO constructor.
     * @param string $to
     * @param string $title
     * @param string $message
     * @param string $file
     */
    public function __construct(string $title, string $message, string $file, string $to = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->file = $file;
        $this->to = $to;
    }


}
