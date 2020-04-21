<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratsRepository")
 */
class Contrats
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
    private $TypeContrat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Atelier", mappedBy="contrats")
     */
    private $contracter;

    public function __construct()
    {
        $this->contracter = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeContrat(): ?string
    {
        return $this->TypeContrat;
    }

    public function setTypeContrat(string $TypeContrat): self
    {
        $this->TypeContrat = $TypeContrat;

        return $this;
    }

    /**
     * @return Collection|Atelier[]
     */
    public function getContracter(): Collection
    {
        return $this->contracter;
    }

    public function addContracter(Atelier $contracter): self
    {
        if (!$this->contracter->contains($contracter)) {
            $this->contracter[] = $contracter;
            $contracter->setContrats($this);
        }

        return $this;
    }

    public function removeContracter(Atelier $contracter): self
    {
        if ($this->contracter->contains($contracter)) {
            $this->contracter->removeElement($contracter);
            // set the owning side to null (unless already changed)
            if ($contracter->getContrats() === $this) {
                $contracter->setContrats(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->TypeContrat;
    }
}
