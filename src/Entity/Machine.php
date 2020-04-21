<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MachineRepository")
 */
class Machine
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
    private $NumSerie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $VersionEprom;

    /**
     * @ORM\Column(type="date")
     */
    private $ProchaineIntervention;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FicheVisite", inversedBy="machines")
     */
    private $technique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Atelier", inversedBy="Situer")
     */
    private $atelier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Model", inversedBy="modeler")
     */
    private $model;

    public function __construct()
    {
        $this->technique = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSerie(): ?string
    {
        return $this->NumSerie;
    }

    public function setNumSerie(string $NumSerie): self
    {
        $this->NumSerie = $NumSerie;

        return $this;
    }

    public function getVersionEprom(): ?string
    {
        return $this->VersionEprom;
    }

    public function setVersionEprom(?string $VersionEprom): self
    {
        $this->VersionEprom = $VersionEprom;

        return $this;
    }

    public function getProchaineIntervention(): ?\DateTimeInterface
    {
        return $this->ProchaineIntervention;
    }

    public function setProchaineIntervention(\DateTimeInterface $ProchaineIntervention): self
    {
        $this->ProchaineIntervention = $ProchaineIntervention;

        return $this;
    }

    /**
     * @return Collection|FicheVisite[]
     */
    public function getTechnique(): Collection
    {
        return $this->technique;
    }

    public function addTechnique(FicheVisite $technique): self
    {
        if (!$this->technique->contains($technique)) {
            $this->technique[] = $technique;
        }

        return $this;
    }

    public function removeTechnique(FicheVisite $technique): self
    {
        if ($this->technique->contains($technique)) {
            $this->technique->removeElement($technique);
        }

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

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }
    public function __toString()
    {
        return $this->NumSerie;
    }
}
