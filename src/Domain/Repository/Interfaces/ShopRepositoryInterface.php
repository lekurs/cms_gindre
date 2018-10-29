<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:19
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Shop;

interface ShopRepositoryInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param $slug
     * @return Shop
     */
    public function getOne($slug): Shop;

    /**
     * @return array
     */
    public function getAllByDpt(): array;

    /**
     * @return array
     */
    public function getClients(): array;

    /**
     * @return array
     */
    public function getAllWithRegion(): array;

    /**
     * @return array
     */
    public function getClientWithRegion(): array;

    /**
     * @param $region
     * @return array
     */
    public function getAllByRegion($region): array;

    /**
     * @param $slug
     * @return Shop
     */
    public function getWithCommandes($slug): Shop;

    /**
     * @param \DateTime $date
     * @return array
     */
    public function getNoCommande(\DateTime $date): array;

    /**
     * @param $date
     * @return mixed
     */
    public function getAllNotRecontacted($date);

    /**
     * @return array
     */
    public function getAllByDepartement(): array;

    /**
     * @param Shop $shop
     * @param array $contacts
     */
//    public function save(Shop $shop, array $contacts):void;

    /**
     * @param Shop $shop
     */
    public function delete(Shop $shop): void;

    /**
     * update
     */
    public function edit(): void;
}
