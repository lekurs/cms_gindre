<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 23:51
 */

namespace App\Domain\Repository;


use App\Domain\Models\Role;
use App\Domain\Repository\Interfaces\RoleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoleRepository extends ServiceEntityRepository implements RoleRepositoryInterface
{
    /**
     * RoleRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->createQueryBuilder("role")
                            ->orderBy("role.role", "ASC")
                            ->getQuery()
                            ->getResult();
    }

    /**
     * @param Role $role
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Role $role): void
    {
        $this->_em->persist($role);
        $this->_em->flush();
    }
}
