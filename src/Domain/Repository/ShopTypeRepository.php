<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:32
 */

namespace App\Domain\Repository;


use App\Domain\Models\ShopType;
use App\Domain\Repository\Interfaces\ShopTypeRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ShopTypeRepository extends ServiceEntityRepository implements ShopTypeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopType::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('shop_type')
                                ->orderBy()
                                ->getQuery()
                                ->getResult();
    }

    public function save(ShopType $shopType): void
    {
        $this->_em->persist($shopType);
        $this->_em->flush();
    }

}
