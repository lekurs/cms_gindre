<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:30
 */

namespace App\Domain\Models;


use App\Domain\DTO\Interfaces\CommandeEditDTOInterface;
use Ramsey\Uuid\Uuid;

class Commande
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
    private $dateCommande;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $number;

    /**
     * Commande constructor.
     *
     * @param Shop $shop
     * @param ProductType $productType
     * @param int $amount
     * @param int $number
     * @param \DateTime $dateOrder
     * @throws \Exception
     */
    public function __construct(
        Shop $shop,
        ProductType $productType,
        \DateTime $dateOrder,
        int $amount,
        int $number
    ) {
        $this->id = Uuid::uuid4();
        $this->shop = $shop;
        $this->productType = $productType;
        $this->dateCommande = $dateOrder;
        $this->amount = $amount;
        $this->number = $number;
    }

    /**
     * @return Uuid
     */
    public function getId()
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
    public function getDateCommande(): \DateTime
    {
        return $this->dateCommande;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    public function editCommande(CommandeEditDTOInterface $editDTO): void
    {
        $this->amount = $editDTO->amount;
        $this->productType = $editDTO->productType;
        $this->number = $editDTO->number;
    }
}
