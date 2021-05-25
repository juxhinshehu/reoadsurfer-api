<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`orders`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Station::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $start_station;

    /**
     * @ORM\ManyToOne(targetEntity=Station::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $end_station;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\ManyToOne(targetEntity=Campervan::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $campervan;

    /**
     * @ORM\OneToMany(targetEntity=OrderEquipment::class, mappedBy="parent_order")
     */
    private $orderEquipments;

    public function __construct()
    {
        $this->orderEquipment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartStation(): ?Station
    {
        return $this->start_station;
    }

    public function setStartStation(?Station $start_station): self
    {
        $this->start_station = $start_station;

        return $this;
    }

    public function getEndStation(): ?Station
    {
        return $this->end_station;
    }

    public function setEndStation(?Station $end_station): self
    {
        $this->end_station = $end_station;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getCampervan(): ?Campervan
    {
        return $this->campervan;
    }

    public function setCampervan(?Campervan $campervan): self
    {
        $this->campervan = $campervan;

        return $this;
    }

    /**
     * @return Collection|OrderEquipment[]
     */
    public function getOrderEquipment(): Collection
    {
        return $this->orderEquipment;
    }

    public function addOrderEquipment(OrderEquipment $orderEquipment): self
    {
        if (!$this->orderEquipment->contains($orderEquipment)) {
            $this->orderEquipments[] = $orderEquipment;
            $orderEquipment->setParentOrder($this);
        }

        return $this;
    }

    public function removeOrderEquipment(OrderEquipment $orderEquipment): self
    {
        if ($this->orderEquipments->removeElement($orderEquipment)) {
            // set the owning side to null (unless already changed)
            if ($orderEquipment->getParentOrder() === $this) {
                $orderEquipment->setParentOrder(null);
            }
        }

        return $this;
    }
}
