<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:13
 */

namespace App\Domain\Repository;


use App\Domain\Models\Message;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class MessageRepository extends ServiceEntityRepository implements MessageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function getAll(Shop $shop): array
    {
        return $this->createQueryBuilder('message')
                                ->leftJoin('message.shop', 'shop')
                                ->where('message.shop = :shop')
                                ->setParameter('shop', $shop)
                                ->orderBy('message.dateContact', 'DESC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(Message $message): void
    {
        $this->_em->persist($message);
        $this->_em->flush();
    }
}