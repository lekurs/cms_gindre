<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:06
 */

namespace App\Domain\DTO\Interfaces;


interface LoginFormDTOInterface
{
    /**
     * LoginFormDTOInterface constructor.
     *
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password);
}
