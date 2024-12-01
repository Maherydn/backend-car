<?php

namespace App\Entity;

use App\Repository\FuelTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuelTypeRepository::class)]
class FuelType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fuelTypeName = null;

    #[ORM\OneToOne(inversedBy: 'fuelType', cascade: ['persist', 'remove'])]
    private ?CarDetail $carDetail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuelTypeName(): ?string
    {
        return $this->fuelTypeName;
    }

    public function setFuelTypeName(string $fuelTypeName): static
    {
        $this->fuelTypeName = $fuelTypeName;

        return $this;
    }

    public function getCarDetail(): ?CarDetail
    {
        return $this->carDetail;
    }

    public function setCarDetail(?CarDetail $carDetail): static
    {
        $this->carDetail = $carDetail;

        return $this;
    }
}
