<?php

namespace App\Repository;

use App\Entity\CostumerConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CostumerConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method CostumerConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method CostumerConfig[]    findAll()
 * @method CostumerConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CostumerConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CostumerConfig::class);
    }

    // /**
    //  * @return CostumerConfig[] Returns an array of CostumerConfig objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CostumerConfig
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
