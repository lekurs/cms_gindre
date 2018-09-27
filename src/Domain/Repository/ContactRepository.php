<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 08:51
 */

namespace App\Domain\Repository;


use App\Domain\Models\Contact;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ContactRepository extends ServiceEntityRepository implements ContactRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function getAll(Shop $shop): array
    {
        return $this->createQueryBuilder('contact')
                                ->leftJoin('contact.shop', 'shop')
                                ->where('contact.shop = :shop')
                                ->setParameter('shop', $shop)
                                ->getQuery()
                                ->getResult();
    }

    public function getOne($id): Contact
    {
        return $this->createQueryBuilder('contact')
                                ->where('contact.id = :id')
                                ->setParameter('id', $id)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function save(Contact $contact): void
    {
        $this->_em->persist($contact);
        $this->_em->flush();
    }

    public function update():void
    {
        $this->_em->flush();
    }
}