<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:32
 */

namespace App\Domain\Repository;


use App\Domain\Models\Order;
use App\Domain\Repository\Interfaces\OrderRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class OrderRepository extends ServiceEntityRepository implements OrderRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('order')
                                ->orderBy('order.dateOrder', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function getOne($id): Order
    {

    }

    public function save(Order $order): void
    {
        $this->_em->persist($order);
        $this->_em->flush();
    }
}