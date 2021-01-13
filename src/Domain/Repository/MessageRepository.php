<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:13
 */

namespace App\Domain\Repository;


use App\Domain\Models\Message;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageRepository extends ServiceEntityRepository implements MessageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    /**
     * @param Shop $shop
     * @return array
     */
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

    /**
     * @param $date
     * @return mixed
     */
    public function getAllRetarded($date)
    {
        return $this->createQueryBuilder('message')
                                ->where(':date > message.dateContact')
                                ->setParameter('date', $date)
                                ->orderBy('message.dateContact', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param $id
     * @return Message
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOne($id): Message
    {
        return $this->createQueryBuilder('message')
                                    ->where('message.id = :id')
                                    ->setParameter('id', $id)
                                    ->getQuery()
                                    ->getOneOrNullResult();
    }

    /**
     * @param Message $message
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Message $message): void
    {
        $this->_em->persist($message);
        $this->_em->flush();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function edit(): void
    {
        $this->_em->flush();
    }

    /**
     * @param Message $message
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Message $message): void
    {
        $this->_em->remove($message);
        $this->_em->flush();
    }
}
