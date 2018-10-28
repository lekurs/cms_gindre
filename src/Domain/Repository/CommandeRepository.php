<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 09:32
 */

namespace App\Domain\Repository;


use App\Domain\Models\Commande;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CommandeRepository extends ServiceEntityRepository implements CommandeRepositoryInterface
{
    /**
     * CommandeRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->createQueryBuilder('commande')
                                ->orderBy('commande.dateCommande', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param Shop $shop
     * @return array
     */
    public function getLimitByShop(Shop $shop): array
    {
        return $this->createQueryBuilder('commande')
            ->leftJoin('commande.shop', 'shop')
            ->where('commande.shop = :shop')
            ->setParameter('shop', $shop->getId())
            ->setMaxResults(3)
            ->orderBy('commande.dateCommande', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $id
     * @return Commande
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOne($id): Commande
    {
        return $this->createQueryBuilder('commande')
                                    ->where('commande.id = :id')
                                    ->setParameter('id', $id)
                                    ->getQuery()
                                    ->getOneOrNullResult();
    }

    public function getAllByShop(Shop $shop): array
    {
        return $this->createQueryBuilder('commande')
                                ->leftJoin('commande.shop', 'shop')
                                ->where('commande.shop = :shop')
                                ->setParameter('shop', $shop->getId())
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param $slug
     * @return array
     */
    public function getAllBySlugShop($slug): array
    {
        return $this->createQueryBuilder('commande')
            ->leftJoin('commande.shop', 'shop')
            ->where('shop.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Shop $shop
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function totalAmountByShop(Shop $shop)
    {
        return $this->createQueryBuilder('commande')
                                ->leftJoin('commande.shop', 'shop')
                                ->where('commande.shop = :shop')
                                ->setParameter('shop', $shop)
                                ->select('SUM(commande.amount) as total')
                                ->getQuery()
                                ->getSingleScalarResult();
    }

    /**
     * @return array
     */
    public function totalByDepartement(): array
    {
        return $this->createQueryBuilder('commande')
                                ->innerJoin('commande.shop', 'shop')
                                ->innerJoin('shop.departement', 'departement')
                                ->select('departement.id, SUM(commande.amount) as total')
                                ->groupBy('departement.id')
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param Commande $order
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Commande $order): void
    {
        $this->_em->persist($order);
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

    /**
     * @param Commande $commande
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Commande $commande): void
    {
        $this->_em->remove($commande);
        $this->_em->flush();
    }
}