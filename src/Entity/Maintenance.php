<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaintenanceRepository::class)]
class Maintenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $maintenanceType = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $maintenaceAt = null;

    #[ORM\Column]
    private ?int $cost = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'maintenances')]
    private ?Car $car = null;

    #[ORM\ManyToOne(inversedBy: 'maintenances')]
    private ?Garage $garage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaintenanceType(): ?string
    {
        return $this->maintenanceType;
    }

    public function setMaintenanceType(string $maintenanceType): static
    {
        $this->maintenanceType = $maintenanceType;

        return $this;
    }

    public function getMaintenaceAt(): ?\DateTimeImmutable
    {
        return $this->maintenaceAt;
    }

    public function setMaintenaceAt(\DateTimeImmutable $maintenaceAt): static
    {
        $this->maintenaceAt = $maintenaceAt;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): static
    {
        $this->cost = $cost;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): static
    {
        $this->car = $car;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }
}
