<?php

namespace App\Repository;

use App\Entity\StreetsZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StreetsZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method StreetsZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method StreetsZone[]    findAll()
 * @method StreetsZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StreetsZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StreetsZone::class);
    }

    // /**
    //  * @return StreetsZone[] Returns an array of StreetsZone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StreetsZone
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
