<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CriteresRepository")
 */
class Criteres
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
    private $Intituler;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Evaluer", mappedBy="evaluation")
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

    public function getIntituler(): ?string
    {
        return $this->Intituler;
    }

    public function setIntituler(string $Intituler): self
    {
        $this->Intituler = $Intituler;

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
            $evaluer->setEvaluation($this);
        }

        return $this;
    }

    public function removeEvaluer(Evaluer $evaluer): self
    {
        if ($this->evaluers->contains($evaluer)) {
            $this->evaluers->removeElement($evaluer);
            // set the owning side to null (unless already changed)
            if ($evaluer->getEvaluation() === $this) {
                $evaluer->setEvaluation(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Intituler;
    }
}
