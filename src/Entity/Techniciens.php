<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\FicheVisite;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\TechniciensRepository")
 */
class Techniciens extends User
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
    private $NomTechnicien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomTechnicien;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FicheVisite", mappedBy="techniciens")
     */
    private $rediger;

    public function __construct()
    {
        $this->rediger = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNomTechnicien(): ?string
    {
        return $this->NomTechnicien;
    }

    public function setNomTechnicien(string $NomTechnicien): self
    {
        $this->NomTechnicien = $NomTechnicien;

        return $this;
    }

    public function getPrenomTechnicien(): ?string
    {
        return $this->PrenomTechnicien;
    }

    public function setPrenomTechnicien(string $PrenomTechnicien): self
    {
        $this->PrenomTechnicien = $PrenomTechnicien;

        return $this;
    }
    // public function setRoles(array $roles): \App\Entity\User
    // {
        
    // }

    /**
     * @return Collection|FicheVisite[]
     */
    public function getRediger(): Collection
    {
        return $this->rediger;
    }

    public function addRediger(FicheVisite $rediger): self
    {
        if (!$this->rediger->contains($rediger)) {
            $this->rediger[] = $rediger;
            $rediger->setTechniciens($this);
        }

        return $this;
    }

    public function removeRediger(FicheVisite $rediger): self
    {
        if ($this->rediger->contains($rediger)) {
            $this->rediger->removeElement($rediger);
            // set the owning side to null (unless already changed)
            if ($rediger->getTechniciens() === $this) {
                $rediger->setTechniciens(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->NomTechnicien;
    }
}
