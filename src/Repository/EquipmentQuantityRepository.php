<?php

namespace App\Repository;

use App\Entity\EquipmentQuantity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipmentQuantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentQuantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentQuantity[]    findAll()
 * @method EquipmentQuantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentQuantityRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct($registry, EquipmentQuantity::class);
    }

    public function filterBy($stationId)
    {
        $dql = 'SELECT eq, s, e FROM App\Entity\EquipmentQuantity eq
                LEFT JOIN eq.station s
                LEFT JOIN eq.equipment e
                WHERE s.id = ?1';

        $query = $this->entityManager->createQuery($dql);
        $query->setParameter(1, $stationId);
        return $query->getResult();
    }
}
