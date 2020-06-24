<?php

namespace App\Repository;

use App\Entity\AnnoyanceZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnnoyanceZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnoyanceZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnoyanceZone[]    findAll()
 * @method AnnoyanceZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoyanceZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnoyanceZone::class);
    }

    // /**
    //  * @return AnnoyanceZone[] Returns an array of AnnoyanceZone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnnoyanceZone
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
