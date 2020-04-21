<?php

namespace App\Repository;

use App\Entity\FicheVisite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheVisite|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheVisite|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheVisite[]    findAll()
 * @method FicheVisite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheVisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheVisite::class);
    }

    // /**
    //  * @return FicheVisite[] Returns an array of FicheVisite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FicheVisite
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
