<?php

namespace App\Entity;

use App\Repository\MedicalRecordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicalRecordRepository::class)
 */
class MedicalRecord
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AnnoyanceZone::class, inversedBy="medicalRecords")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annoyanceZone;

    /**
     * @ORM\ManyToOne(targetEntity=PainIntensity::class, inversedBy="medicalRecords")
     * @ORM\JoinColumn(nullable=false)
     */
    private $painIntensity;

    /**
     * @ORM\ManyToOne(targetEntity=Annoyance::class, inversedBy="medicalRecords")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annoyance;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $details;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="medicalRecords")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnoyanceZone(): ?AnnoyanceZone
    {
        return $this->annoyanceZone;
    }

    public function setAnnoyanceZone(?AnnoyanceZone $annoyanceZone): self
    {
        $this->annoyanceZone = $annoyanceZone;

        return $this;
    }

    public function getPainIntensity(): ?PainIntensity
    {
        return $this->painIntensity;
    }

    public function setPainIntensity(?PainIntensity $painIntensity): self
    {
        $this->painIntensity = $painIntensity;

        return $this;
    }

    public function getAnnoyance(): ?Annoyance
    {
        return $this->annoyance;
    }

    public function setAnnoyance(?Annoyance $annoyance): self
    {
        $this->annoyance = $annoyance;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
