<?php

namespace App\Entity;

use App\Repository\CampervanRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass=CampervanRepository::class)
 * @Entity @Table(name="campervans")
 */
class Campervan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Station")
     * @JoinColumn(name="station_id", referencedColumnName="id")
     */
    private $station;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $target_plate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTargetPlate(): ?string
    {
        return $this->target_plate;
    }

    public function setTargetPlate(string $target_plate): self
    {
        $this->target_plate = $target_plate;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }
}
