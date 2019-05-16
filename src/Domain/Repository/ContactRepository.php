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
    /**
     * ContactRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    /**
     * @param Shop $shop
     * @return array
     */
    public function getAll(Shop $shop): array
    {
        return $this->createQueryBuilder('contact')
                                ->leftJoin('contact.shop', 'shop')
                                ->where('contact.shop = :shop')
                                ->setParameter('shop', $shop)
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param $id
     * @return Contact
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOne($id): Contact
    {
        return $this->createQueryBuilder('contact')
                                ->where('contact.id = :id')
                                ->setParameter('id', $id)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    /**
     * @param $slug
     * @return Contact
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOneBySlug($slug): Contact
    {
        return $this->createQueryBuilder('contact')
            ->where('contact.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAllContactsClients(): array
    {
        return $this->createQueryBuilder('contact')
                                ->leftJoin('contact.shop', 'shop')
                                ->leftJoin('shop.status', 'status')
                                ->where('shop.prospect = 0')
                                ->andWhere('status.status = Ouvert')
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param Contact $contact
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Contact $contact): void
    {
        $this->_em->persist($contact);
        $this->_em->flush();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update():void
    {
        $this->_em->flush();
    }

    /**
     * @param Contact $contact
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Contact $contact):void
    {
        $this->_em->remove($contact);
        $this->_em->flush();
    }
}
