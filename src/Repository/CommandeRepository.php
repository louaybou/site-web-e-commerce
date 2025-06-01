<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commande>
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    // Exemple de méthode personnalisée :
    // /**
    //  * @return Commande[] Returns an array of Commande objects
    //  */
    // public function findValidees(): array
    // {
    //     return $this->createQueryBuilder('c')
    //         ->andWhere('c.statut = :val')
    //         ->setParameter('val', 'validee')
    //         ->orderBy('c.createdAt', 'DESC')
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
}