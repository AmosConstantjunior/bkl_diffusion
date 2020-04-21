<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomVille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CpVille;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Clients", mappedBy="ville")
     */
    private $resident;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Atelier", mappedBy="ville")
     */
    private $lieu;

    public function __construct()
    {
        $this->resident = new ArrayCollection();
        $this->lieu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVille(): ?string
    {
        return $this->NomVille;
    }

    public function setNomVille(string $NomVille): self
    {
        $this->NomVille = $NomVille;

        return $this;
    }

    public function getCpVille(): ?string
    {
        return $this->CpVille;
    }

    public function setCpVille(string $CpVille): self
    {
        $this->CpVille = $CpVille;

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getResident(): Collection
    {
        return $this->resident;
    }

    public function addResident(Clients $resident): self
    {
        if (!$this->resident->contains($resident)) {
            $this->resident[] = $resident;
            $resident->setVille($this);
        }

        return $this;
    }

    public function removeResident(Clients $resident): self
    {
        if ($this->resident->contains($resident)) {
            $this->resident->removeElement($resident);
            // set the owning side to null (unless already changed)
            if ($resident->getVille() === $this) {
                $resident->setVille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Atelier[]
     */
    public function getLieu(): Collection
    {
        return $this->lieu;
    }

    public function addLieu(Atelier $lieu): self
    {
        if (!$this->lieu->contains($lieu)) {
            $this->lieu[] = $lieu;
            $lieu->setVille($this);
        }

        return $this;
    }

    public function removeLieu(Atelier $lieu): self
    {
        if ($this->lieu->contains($lieu)) {
            $this->lieu->removeElement($lieu);
            // set the owning side to null (unless already changed)
            if ($lieu->getVille() === $this) {
                $lieu->setVille(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->NomVille;
    }
}
