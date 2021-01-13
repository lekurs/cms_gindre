<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 23:50
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Role
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $role;

    /**
     * @var \ArrayAccess
     */
    private $contacts;

    /**
     * Role constructor.
     *
     * @param string $role
     * @throws \Exception
     */
    public function __construct(string $role)
    {
        $this->id = Uuid::uuid4();
        $this->role = $role;
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return \ArrayAccess
     */
    public function getContacts(): \ArrayAccess
    {
        return $this->contacts;
    }
}