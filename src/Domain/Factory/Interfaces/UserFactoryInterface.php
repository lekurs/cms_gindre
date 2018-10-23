<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 14:36
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\Models\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

interface UserFactoryInterface
{
    /**
     * UserFactoryInterface constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory);

    /**
     * @param string $login
     * @param string $password
     * @param string $email
     * @param $roles
     * @param string $slug
     * @return User
     */
    public function create(string $login, string $password, string $email, $roles, string $slug): User;
}
