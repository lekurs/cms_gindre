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

    public function save(Shop $shop, array $contacts):void
    {
        foreach ($contacts as $contact) {
            $contact->manageShop($shop);
        }

        $this->_em->persist($shop);
        $this->_em->flush();
    }

}