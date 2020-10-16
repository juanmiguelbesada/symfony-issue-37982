<?php

namespace App\Repository;

use App\Entity\SeasonPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SeasonPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeasonPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeasonPrice[]    findAll()
 * @method SeasonPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeasonPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeasonPrice::class);
    }

    // /**
    //  * @return SeasonPrice[] Returns an array of SeasonPrice objects
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
    public function findOneBySomeField($value): ?SeasonPrice
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
