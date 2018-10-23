<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:12
 */

namespace App\Domain\DTO\Interfaces;


interface RegistrationDTOInterface
{
    /**
     * RegistrationDTOInterface constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(string $username, string $password, string $email);
}
