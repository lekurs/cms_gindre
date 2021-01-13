<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:29
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class StatusShop
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \ArrayAccess
     */
    private $shops;

    /**
     * StatusShop constructor.
     *
     * @param string $status
     * @throws \Exception
     */
    public function __construct(string $status)
    {
        $this->id = Uuid::uuid4();
        $this->status = $status;
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return \ArrayAccess
     */
    public function getShops(): \ArrayAccess
    {
        return $this->shops;
    }
}