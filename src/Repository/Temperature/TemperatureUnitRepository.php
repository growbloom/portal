<?php

namespace App\Repository\Temperature;

use App\Entity\Temperature\TemperatureUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TemperatureUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method TemperatureUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method TemperatureUnit[]    findAll()
 * @method TemperatureUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TemperatureUnitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TemperatureUnit::class);
    }

    // /**
    //  * @return TemperatureUnit[] Returns an array of TemperatureUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TemperatureUnit
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
