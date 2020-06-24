<?php

namespace App\Repository;

use App\Entity\PainIntensity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PainIntensity|null find($id, $lockMode = null, $lockVersion = null)
 * @method PainIntensity|null findOneBy(array $criteria, array $orderBy = null)
 * @method PainIntensity[]    findAll()
 * @method PainIntensity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PainIntensityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PainIntensity::class);
    }

    // /**
    //  * @return PainIntensity[] Returns an array of PainIntensity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PainIntensity
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
