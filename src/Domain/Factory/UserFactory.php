<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 14:36
 */

namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Models\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserFactory implements UserFactoryInterface
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * UserFactory constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @param string $login
     * @param string $password
     * @param string $email
     * @param $roles
     * @param string $slug
     * @return User
     * @throws \Exception
     */
    public function create(string $login, string $password, string $email, $roles, string $slug): User
    {
        $encoder = $this->encoderFactory->getEncoder(User::class);

        return new User($login, $password, \Closure::fromCallable([$encoder, 'encodePassword']), $email, $roles, $slug);
    }
}
