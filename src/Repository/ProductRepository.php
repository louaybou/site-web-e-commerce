<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * Retourne tous les produits avec un stock supérieur à zéro.
     *
     * @return Product[]
     */
    public function findAvailable(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.stock > 0')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
