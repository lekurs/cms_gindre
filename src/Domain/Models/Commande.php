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
     * Commande constructor.
     *
     * @param Shop $shop
     * @param ProductType $productType
     * @param int $amount
     * @param \DateTime $dateOrder
     * @throws \Exception
     */
    public function __construct(
        Shop $shop,
        ProductType $productType,
        \DateTime $dateOrder,
        int $amount
    ) {
        $this->id = Uuid::uuid4();
        $this->shop = $shop;
        $this->productType = $productType;
        $this->dateCommande = $dateOrder;
        $this->amount = $amount;
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

    public function editCommande(CommandeEditDTOInterface $editDTO): void
    {
        $this->amount = $editDTO->amount;
        $this->productType = $editDTO->productType;
    }
}
