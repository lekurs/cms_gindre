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
use Doctrine\Common\Persistence\ManagerRegistry;

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> e6858e0693be3c654611e26af382b13dbf7d9b09

    public function save(ShopType $shopType): void
    {
        $this->_em->persist($shopType);
        $this->_em->flush();
    }
<<<<<<< HEAD
=======
>>>>>>> dev(shopType): add mapping & factory
=======
>>>>>>> shopType
=======
>>>>>>> be8c29691595077cfdb595f061ffd2bedc0802c1
>>>>>>> e6858e0693be3c654611e26af382b13dbf7d9b09
}
