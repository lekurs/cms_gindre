<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:18
 */

namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\Message;
use App\Domain\Models\Shop;

interface MessageRepositoryInterface
{
    /**
     * @param Shop $shop
     * @return array
     */
    public function getAll(Shop $shop): array;

    /**
     * @param $date
     * @return mixed
     */
    public function getAllRetarded($date);

    /**
     * @param $id
     * @return Message
     */
    public function getOne($id): Message;

    /**
     * @param Message $message
     */
    public function save(Message $message): void;

    /**
     * update
     */
    public function edit(): void;

    /**
     * @param Message $message
     */
    public function delete(Message $message): void;
}