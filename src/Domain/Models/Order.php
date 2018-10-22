<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:30
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class Order
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var Shop
     */
    private $shop;

    /**
     * @var ProductType
     */
    private $productType;

    /**
     * @var \DateTime
     */
    private $dateOrder;

    /**
     * @var int
     */
    private $amout;

    /**
     * Order constructor.
     *
     * @param Shop $shop
     * @param ProductType $productType
     * @param int $amout
     * @param \DateTime $dateOrder
     * @throws \Exception
     */
    public function __construct(Shop $shop, ProductType $productType, \DateTime $dateOrder, int $amout)
    {
        $this->id = Uuid::uuid4();
        $this->shop = $shop;
        $this->productType = $productType;
        $this->dateOrder = $dateOrder;
        $this->amout = $amout;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @return ProductType
     */
    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    /**
     * @return \DateTime
     */
    public function getDateOrder(): \DateTime
    {
        return $this->dateOrder;
    }

    /**
     * @return int
     */
    public function getAmout(): int
    {
        return $this->amout;
    }
}
