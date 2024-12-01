<?php

namespace App\Entity;

use App\Repository\TransmissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransmissionRepository::class)]
class Transmission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $transmissionName = null;

    #[ORM\OneToOne(inversedBy: 'transmission', cascade: ['persist', 'remove'])]
    private ?CarDetail $carDetail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransmissionName(): ?string
    {
        return $this->transmissionName;
    }

    public function setTransmissionName(string $transmissionName): static
    {
        $this->transmissionName = $transmissionName;

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
