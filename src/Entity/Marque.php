<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarqueRepository")
 */
class Marque
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
    private $NomMarque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Model", mappedBy="marque")
     */
    private $marquer;

    public function __construct()
    {
        $this->marquer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarque(): ?string
    {
        return $this->NomMarque;
    }

    public function setNomMarque(string $NomMarque): self
    {
        $this->NomMarque = $NomMarque;

        return $this;
    }

    /**
     * @return Collection|Model[]
     */
    public function getMarquer(): Collection
    {
        return $this->marquer;
    }

    public function addMarquer(Model $marquer): self
    {
        if (!$this->marquer->contains($marquer)) {
            $this->marquer[] = $marquer;
            $marquer->setMarque($this);
        }

        return $this;
    }

    public function removeMarquer(Model $marquer): self
    {
        if ($this->marquer->contains($marquer)) {
            $this->marquer->removeElement($marquer);
            // set the owning side to null (unless already changed)
            if ($marquer->getMarque() === $this) {
                $marquer->setMarque(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->NomMarque;
    }
}
