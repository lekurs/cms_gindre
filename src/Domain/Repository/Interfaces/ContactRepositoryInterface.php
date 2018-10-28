<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:18
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Contact;
use App\Domain\Models\Shop;

interface ContactRepositoryInterface
{
    /**
     * @param Shop $shop
     * @return array
     */
    public function getAll(Shop $shop): array;

    /**
     * @param $id
     * @return Contact
     */
    public function getOne($id): Contact;

    /**
     * @param $slug
     * @return Contact
     */
    public function getOneBySlug($slug): Contact;

    /**
     * @param Contact $contact
     */
    public function save(Contact $contact): void;

    /**
     * update Contact
     */
    public function update():void;

    /**
     * @param Contact $contact
     */
    public function delete(Contact $contact):void;
}
