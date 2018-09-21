<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 09:51
 */

namespace App\Domain\Repository;


use App\Domain\Models\Region;
use App\Domain\Repository\Interfaces\RegionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class RegionRepository extends ServiceEntityRepository implements RegionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Region::class);
    }

    /**
     * @param $zip
     * @return Region
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOne($zip): Region
    {
        return $this->createQueryBuilder('region')
                            ->where('region.dept = :zip')
                            ->setParameter('zip', $zip)
                            ->getQuery()
                            ->getOneOrNullResult();
    }

}