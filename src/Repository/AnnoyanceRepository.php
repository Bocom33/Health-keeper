<?php

namespace App\Repository;

use App\Entity\Annoyance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Annoyance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annoyance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annoyance[]    findAll()
 * @method Annoyance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoyanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annoyance::class);
    }

    // /**
    //  * @return Annoyance[] Returns an array of Annoyance objects
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
    public function findOneBySomeField($value): ?Annoyance
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
