<?php

namespace App\Entity;

use App\Repository\AdministrativeDocumentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrativeDocumentRepository::class)]
class AdministrativeDocument
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $registrationCertificate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $technicalInspectionAt = null;

    #[ORM\OneToOne(inversedBy: 'administrativeDocument', cascade: ['persist', 'remove'])]
    private ?CarDetail $carDetail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationCertificate(): ?string
    {
        return $this->registrationCertificate;
    }

    public function setRegistrationCertificate(string $registrationCertificate): static
    {
        $this->registrationCertificate = $registrationCertificate;

        return $this;
    }

    public function getTechnicalInspectionAt(): ?\DateTimeImmutable
    {
        return $this->technicalInspectionAt;
    }

    public function setTechnicalInspectionAt(\DateTimeImmutable $technicalInspectionAt): static
    {
        $this->technicalInspectionAt = $technicalInspectionAt;

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
