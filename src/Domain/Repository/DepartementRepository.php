<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:37
 */

namespace App\Domain\Repository;


use App\Domain\Models\Departement;
use App\Domain\Repository\Interfaces\DepartementRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DepartementRepository extends ServiceEntityRepository implements DepartementRepositoryInterface
{
    /**
     * DepartementRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Departement::class);
    }

    /**
     * @param $zip
     * @return Departement
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOne($zip): Departement
    {
        return $this->createQueryBuilder('departement')
                                ->where('departement.zip = :zip')
                                ->setParameter('zip', $zip)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    /**
     * @return array
     */
    public function getAllWithShop(): array
    {
        return $this->createQueryBuilder('departement')
                                ->innerJoin('departement.region', 'region')
                                ->innerJoin('region.shops', 'shops')
                                ->where('shops.prospect = 0')
                                ->orderBy('departement.departement', 'ASC')
                                ->getQuery()
                                ->getResult();
    }
}
