<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 09:38
 */

namespace App\Domain\Repository;


use App\Domain\Models\ContactType;
use App\Domain\Repository\Interfaces\ContactTypeRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContactTypeRepository extends ServiceEntityRepository implements ContactTypeRepositoryInterface
{
    /**
     * ContactTypeRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactType::class);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->createQueryBuilder('contact_type')
                                ->orderBy('contact_type.type', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param ContactType $contactType
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException`
     */
    public function save(ContactType $contactType): void
    {
        $this->_em->persist($contactType);
        $this->_em->flush();
    }
}
