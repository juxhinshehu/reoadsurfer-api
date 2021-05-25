<?php

namespace App\Entity;

use App\Repository\EquipmentQuantityPerDayRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass=EquipmentQuantityPerDayRepository::class)
 * @Entity @Table(name="equipment_quantities_per_day")

 */
class EquipmentQuantityPerDay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=EquipmentQuantity::class)
     * @JoinColumn(name="equipment_quantity_id", referencedColumnName="id")
     */
    private $equipmentQuantity;

    /**
     * @ORM\Column(type="date")
     */
    private $day;

    /**
     * @ORM\Column(type="integer")
     */
    private $bookingsCounter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentQuantity(): ?EquipmentQuantity
    {
        return $this->equipmentQuantity;
    }

    public function setEquipmentQuantity(?EquipmentQuantity $equipmentQuantity): self
    {
        $this->equipmentQuantity = $equipmentQuantity;

        return $this;
    }

    public function getBookingsCounter(): ?int
    {
        return $this->bookingsCounter;
    }

    public function setBookingsCounter(int $bookingsCounter): self
    {
        $this->bookingsCounter = $bookingsCounter;

        return $this;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }
}
