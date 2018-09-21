<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 20/09/2018
 * Time: 10:23
 */

namespace App\Domain\Repository;


use App\Domain\Models\ProductType;
use App\Domain\Repository\Interfaces\ProductTypeRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ProductTypeRepository extends ServiceEntityRepository implements ProductTypeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductType::class);
    }

    public function getAll(): array
    {
        return $this->createQueryBuilder('product_type')
                                ->orderBy('product_type.product', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    /**
     * @param ProductType $productType
     */
    public function save(ProductType $productType): void
    {
        $this->_em->persist($productType);
        $this->_em->flush();
    }
}
