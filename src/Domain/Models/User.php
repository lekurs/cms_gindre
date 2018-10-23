<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 14:26
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $roles;

    /**
     * @var string
     */
    private $slug;

    /**
     * User constructor.
     *
     * @param string $username
     * @param string $password
     * @param callable $encoder
     * @param string $email
     * @param string $roles
     * @param string $slug
     * @throws \Exception
     */
    public function __construct(
        string $username,
        string $password,
        callable $encoder,
        string $email,
        string $roles,
        string $slug
    ) {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->password = $encoder($password, null);
        $this->email = $email;
        $this->roles[] = $roles;
        $this->slug = $slug;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
