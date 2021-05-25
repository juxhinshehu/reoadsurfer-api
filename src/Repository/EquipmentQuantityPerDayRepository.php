<?php

namespace App\Repository;

use App\Entity\EquipmentQuantityPerDay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipmentQuantityPerDay|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentQuantityPerDay|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentQuantityPerDay[]    findAll()
 * @method EquipmentQuantityPerDay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentQuantityPerDayRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($registry, EquipmentQuantityPerDay::class);
    }

    public function filterBy($stationId, $day)
    {
        $dql = 'SELECT eqd FROM App\Entity\EquipmentQuantityPerDay eqd
                LEFT JOIN eqd.equipmentQuantity eq
                LEFT JOIN eq.station s 
                WHERE eqd.day = ?1 and s.id = ?2';

        $query = $this->entityManager->createQuery($dql);
        $query->setParameter(1, $day);
        $query->setParameter(2, $stationId);
        return $query->getResult();
    }

}
