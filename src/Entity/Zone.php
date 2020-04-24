<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZoneRepository")
 */
class Zone
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
    private $IntitulerZone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ville", mappedBy="zone")
     */
    private $zoner;

    public function __construct()
    {
        $this->zoner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitulerZone(): ?string
    {
        return $this->IntitulerZone;
    }

    public function setIntitulerZone(string $IntitulerZone): self
    {
        $this->IntitulerZone = $IntitulerZone;

        return $this;
    }

    /**
     * @return Collection|Ville[]
     */
    public function getZoner(): Collection
    {
        return $this->zoner;
    }

    public function addZoner(Ville $zoner): self
    {
        if (!$this->zoner->contains($zoner)) {
            $this->zoner[] = $zoner;
            $zoner->setZone($this);
        }

        return $this;
    }

    public function removeZoner(Ville $zoner): self
    {
        if ($this->zoner->contains($zoner)) {
            $this->zoner->removeElement($zoner);
            // set the owning side to null (unless already changed)
            if ($zoner->getZone() === $this) {
                $zoner->setZone(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->IntitulerZone;
    }
}
