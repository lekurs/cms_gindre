<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:18
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Commande;
use App\Domain\Models\Shop;

interface CommandeRepositoryInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param Shop $shop
     * @return array
     */
    public function getLimitByShop(Shop $shop): array;

    /**
     * @param $id
     * @return Commande
     */
    public function getOne($id): Commande;

    /**
     * @param Shop $shop
     * @return array
     */
    public function getAllByShop(Shop $shop): array;

    /**
     * @param $slug
     * @return array
     */
    public function getAllBySlugShop($slug): array;

    /**
     * @param Shop $shop
     * @return mixed
     */
    public function totalAmountByShop(Shop $shop);

    /**
     * @return array
     */
    public function totalByDepartement(): array;

    /**
     * @param Commande $order
     */
    public function save(Commande $order): void;

    public function edit(): void;

    /**
     * @param Commande $commande
     */
    public function delete(Commande $commande): void;
}
