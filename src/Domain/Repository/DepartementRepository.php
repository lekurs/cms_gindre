<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:37
 */

namespace App\Domain\Repository;


use App\Domain\Models\Departement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DepartementRepository extends ServiceEntityRepository
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

    public function getOne($zip): Departement
    {
        return $this->createQueryBuilder('departement')
                                ->where('departement.zip = :zip')
                                ->setParameter('zip', $zip)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

}