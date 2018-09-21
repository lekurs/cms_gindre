<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 10:23
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class ProductType
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $product;

    /**
     * @var \ArrayAccess
     */
    private $orders;

    /**
     * ProductType constructor.
     *
     * @param string $product
     * @throws \Exception
     */
    public function __construct(string $product)
    {
        $this->id = Uuid::uuid4();
        $this->product = $product;
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
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return \ArrayAccess
     */
    public function getOrders(): \ArrayAccess
    {
        return $this->orders;
    }
}