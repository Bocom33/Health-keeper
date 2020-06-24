<?php

namespace App\Entity;

use App\Repository\AnnoyanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnoyanceRepository::class)
 */
class Annoyance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MedicalRecord::class, mappedBy="annoyance")
     */
    private $medicalRecords;

    public function __construct()
    {
        $this->medicalRecords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MedicalRecord[]
     */
    public function getMedicalRecords(): Collection
    {
        return $this->medicalRecords;
    }

    public function addMedicalRecord(MedicalRecord $medicalRecord): self
    {
        if (!$this->medicalRecords->contains($medicalRecord)) {
            $this->medicalRecords[] = $medicalRecord;
            $medicalRecord->setAnnoyance($this);
        }

        return $this;
    }

    public function removeMedicalRecord(MedicalRecord $medicalRecord): self
    {
        if ($this->medicalRecords->contains($medicalRecord)) {
            $this->medicalRecords->removeElement($medicalRecord);
            // set the owning side to null (unless already changed)
            if ($medicalRecord->getAnnoyance() === $this) {
                $medicalRecord->setAnnoyance(null);
            }
        }

        return $this;
    }
}
