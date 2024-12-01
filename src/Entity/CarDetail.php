<?php

namespace App\Entity;

use App\Repository\CarDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarDetailRepository::class)]
class CarDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $lastMaintenaceAt = null;

    #[ORM\OneToOne(mappedBy: 'carDetail', cascade: ['persist', 'remove'])]
    private ?FuelType $fuelType = null;

    #[ORM\OneToOne(mappedBy: 'carDetail', cascade: ['persist', 'remove'])]
    private ?Transmission $transmission = null;

    #[ORM\OneToOne(mappedBy: 'carDetail', cascade: ['persist', 'remove'])]
    private ?AdministrativeDocument $administrativeDocument = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getLastMaintenaceAt(): ?\DateTimeImmutable
    {
        return $this->lastMaintenaceAt;
    }

    public function setLastMaintenaceAt(\DateTimeImmutable $lastMaintenaceAt): static
    {
        $this->lastMaintenaceAt = $lastMaintenaceAt;

        return $this;
    }

    public function getFuelType(): ?FuelType
    {
        return $this->fuelType;
    }

    public function setFuelType(?FuelType $fuelType): static
    {
        // unset the owning side of the relation if necessary
        if ($fuelType === null && $this->fuelType !== null) {
            $this->fuelType->setCarDetail(null);
        }

        // set the owning side of the relation if necessary
        if ($fuelType !== null && $fuelType->getCarDetail() !== $this) {
            $fuelType->setCarDetail($this);
        }

        $this->fuelType = $fuelType;

        return $this;
    }

    public function getTransmission(): ?Transmission
    {
        return $this->transmission;
    }

    public function setTransmission(?Transmission $transmission): static
    {
        // unset the owning side of the relation if necessary
        if ($transmission === null && $this->transmission !== null) {
            $this->transmission->setCarDetail(null);
        }

        // set the owning side of the relation if necessary
        if ($transmission !== null && $transmission->getCarDetail() !== $this) {
            $transmission->setCarDetail($this);
        }

        $this->transmission = $transmission;

        return $this;
    }

    public function getAdministrativeDocument(): ?AdministrativeDocument
    {
        return $this->administrativeDocument;
    }

    public function setAdministrativeDocument(?AdministrativeDocument $administrativeDocument): static
    {
        // unset the owning side of the relation if necessary
        if ($administrativeDocument === null && $this->administrativeDocument !== null) {
            $this->administrativeDocument->setCarDetail(null);
        }

        // set the owning side of the relation if necessary
        if ($administrativeDocument !== null && $administrativeDocument->getCarDetail() !== $this) {
            $administrativeDocument->setCarDetail($this);
        }

        $this->administrativeDocument = $administrativeDocument;

        return $this;
    }
}
