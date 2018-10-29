<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:16
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;

class ShopType
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $shopType;


    /**
     * ShopType constructor.
     *
     * @param string $shopType
     * @throws \Exception
     */
    public function __construct(string $shopType)
    {
        $this->id = Uuid::uuid4();
        $this->shopType = $shopType;
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
    public function getShopType(): string
    {
        return $this->shopType;
    }
}
