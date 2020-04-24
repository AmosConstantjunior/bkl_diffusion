<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttestationRepository")
 */
class Attestation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $TotalPoints;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Atelier", inversedBy="attester")
     */
    private $atelier;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Evaluer", mappedBy="evalu")
     */
    private $evaluers;

    public function __construct()
    {
        $this->evaluers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTotalPoints(): ?int
    {
        return $this->TotalPoints;
    }

    public function setTotalPoints(int $TotalPoints): self
    {
        $this->TotalPoints = $TotalPoints;

        return $this;
    }

    public function getAtelier(): ?Atelier
    {
        return $this->atelier;
    }

    public function setAtelier(?Atelier $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }

    /**
     * @return Collection|Evaluer[]
     */
    public function getEvaluers(): Collection
    {
        return $this->evaluers;
    }

    public function addEvaluer(Evaluer $evaluer): self
    {
        if (!$this->evaluers->contains($evaluer)) {
            $this->evaluers[] = $evaluer;
            $evaluer->setEvalu($this);
        }

        return $this;
    }

    public function removeEvaluer(Evaluer $evaluer): self
    {
        if ($this->evaluers->contains($evaluer)) {
            $this->evaluers->removeElement($evaluer);
            // set the owning side to null (unless already changed)
            if ($evaluer->getEvalu() === $this) {
                $evaluer->setEvalu(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Intituler;
    }
}
