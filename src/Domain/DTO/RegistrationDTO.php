<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:12
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\RegistrationDTOInterface;

class RegistrationDTO implements RegistrationDTOInterface
{
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    /**
     * RegistrationDTO constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(string $username, string $password, string $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
