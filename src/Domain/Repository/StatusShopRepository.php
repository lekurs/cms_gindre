<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:33
 */

namespace App\Domain\Repository;


use App\Domain\Models\StatusShop;
use App\Domain\Repository\Interfaces\StatutShopRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class StatusShopRepository extends ServiceEntityRepository implements StatutShopRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusShop::class);
    }


    public function save(StatusShop $statutShop): void
    {
        $this->_em->persist($statutShop);
        $this->_em->flush();
    }
}