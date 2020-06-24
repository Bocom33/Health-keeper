<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="le champ Email ne doit pas être vide !")
     * @Assert\Email(message="Cette email n'est pas valide")
     * @ORM\Column(type="string", length=80, unique=true)
     * @Assert\Length(max=80, maxMessage="Le Nom ne doit pas dépasser {{ limit }} caractères")
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MedicalRecord::class, mappedBy="user")
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $medicalRecord->setUser($this);
        }

        return $this;
    }

    public function removeMedicalRecord(MedicalRecord $medicalRecord): self
    {
        if ($this->medicalRecords->contains($medicalRecord)) {
            $this->medicalRecords->removeElement($medicalRecord);
            // set the owning side to null (unless already changed)
            if ($medicalRecord->getUser() === $this) {
                $medicalRecord->setUser(null);
            }
        }

        return $this;
    }
}
