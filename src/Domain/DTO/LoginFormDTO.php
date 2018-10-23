<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:06
 */

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\LoginFormDTOInterface;

class LoginFormDTO implements LoginFormDTOInterface
{
    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $password;

    /**
     * LoginFormDTO constructor.
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
}
