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
            ->where('shop.prospect = 1')
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

    public function save(Shop $shop, array $contacts):void
    {
        foreach ($contacts as $contact) {
            $contact->manageShop($shop);
        }

        $this->_em->persist($shop);
        $this->_em->flush();
    }

    public function delete(Shop $shop): void
    {
        $this->_em->remove($shop);
        $this->_em->flush();
    }
}