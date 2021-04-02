<?php

namespace App\Repository;

use App\Entity\Statuspec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Statuspec|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statuspec|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statuspec[]    findAll()
 * @method Statuspec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatuspecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statuspec::class);
    }

    // /**
    //  * @return Statuspec[] Returns an array of Statuspec objects
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
    public function findOneBySomeField($value): ?Statuspec
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
