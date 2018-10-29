<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 18:00
 */

namespace App\Domain\Repository;


use App\Domain\Models\Contact;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ShopRepository extends ServiceEntityRepository implements ShopRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shop::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('shop')
                            ->orderBy('shop.name', 'ASC')
                            ->getQuery()
                            ->getResult();
    }

    public function getOne($slug): Shop
    {
        return $this->createQueryBuilder('shop')
                                ->where('shop.slug = :slug')
                                ->setParameter('slug', $slug)
                                ->getQuery()
                                ->getOneOrNullResult();
    }

    public function getAllByDpt(): array
    {
        return $this->createQueryBuilder('shop')
            ->leftJoin('shop.region', 'region')
            ->innerJoin('region.departements', 'departements')
            ->where('shop.prospect = 1')
            ->orderBy('shop.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getClients(): array
    {
        return $this->createQueryBuilder('shop')
            ->leftJoin('shop.region', 'region')
            ->innerJoin('region.departements', 'departements')
            ->where('shop.prospect = 0')
            ->orderBy('shop.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getAllWithRegion(): array
    {
        return $this->createQueryBuilder('shop')
            ->innerJoin('shop.region', 'region')
            ->orderBy('shop.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getClientWithRegion(): array
    {
        return $this->createQueryBuilder('shop')
            ->leftJoin('shop.region', 'region')
            ->where('shop.prospect = 0')
            ->orderBy('shop.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Region $region
     * @return array
     */
    public function getAllByRegion($region): array
    {
        return $this->createQueryBuilder('shop')
                                ->leftJoin('shop.region', 'region')
                                ->where('shop.region = :region')
                                ->setParameter('region', $region)
                                ->orderBy('shop.name', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function getWithCommandes($slug): Shop
    {
        return $this->createQueryBuilder('shop')
                                    ->leftJoin('shop.commandes', 'commandes')
                                    ->where('shop.slug = :slug')
                                    ->setParameter('slug', $slug)
                                    ->orderBy('commandes.dateCommande', 'ASC')
                                    ->getQuery()
                                    ->getOneOrNullResult();
    }

    public function getNoCommande(\DateTime $date): array
    {
        return $this->createQueryBuilder('shop')
            ->leftJoin('shop.commandes', 'commandes')
            ->where(':date > commandes.dateCommande')
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $date
     * @return mixed
     */
    public function getAllNotRecontacted($date)
    {
        return $this->createQueryBuilder('shop')
            ->leftJoin('shop.messages', 'messages')
            ->where(':date > messages.dateContact')
            ->setParameter('date', $date)
            ->orderBy('messages.dateContact', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array
     */
    public function getAllByDepartement(): array
    {
        return $this->createQueryBuilder('shop')
            ->innerJoin('shop.departement', 'departement')
            ->where('shop.prospect = 0')
            ->select('departement.zip, COUNT(shop.id) as total_shop')
            ->groupBy('departement.zip')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Shop $shop
     * @param array $contacts
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Shop $shop, array $contacts):void
    {
        foreach ($contacts as $contact) {
            $contact->manageShop($shop);
        }

        $this->_em->persist($shop);
        $this->_em->flush();
    }

    /**
     * @param Shop $shop
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Shop $shop): void
    {
        $this->_em->remove($shop);
        $this->_em->flush();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function edit(): void
    {
        $this->_em->flush();
    }
}
