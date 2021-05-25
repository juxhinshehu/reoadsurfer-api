<?php

namespace App\Repository;

use App\Entity\OrderEquipment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderEquipment|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderEquipment|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderEquipment[]    findAll()
 * @method OrderEquipment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderEquipmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderEquipment::class);
    }

    // /**
    //  * @return OrderEquipment[] Returns an array of OrderEquipment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderEquipment
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
