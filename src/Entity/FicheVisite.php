<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FicheVisiteRepository")
 */
class FicheVisite
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
    private $DateIntervention;

    /**
     * @ORM\Column(type="float")
     */
    private $MontantHt;

    /**
     * @ORM\Column(type="float")
     */
    private $MontantConsommable;

    /**
     * @ORM\Column(type="text")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contacts", inversedBy="ficheVisites")
     */
    private $lier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Techniciens", inversedBy="rediger")
     */
    private $techniciens;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Machine", mappedBy="technique")
     */
    private $machines;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Atelier", inversedBy="ficher")
     */
    private $atelier;

    public function __construct()
    {
        $this->lier = new ArrayCollection();
        $this->machines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->DateIntervention;
    }

    public function setDateIntervention(\DateTimeInterface $DateIntervention): self
    {
        $this->DateIntervention = $DateIntervention;

        return $this;
    }

    public function getMontantHt(): ?float
    {
        return $this->MontantHt;
    }

    public function setMontantHt(float $MontantHt): self
    {
        $this->MontantHt = $MontantHt;

        return $this;
    }

    public function getMontantConsommable(): ?float
    {
        return $this->MontantConsommable;
    }

    public function setMontantConsommable(float $MontantConsommable): self
    {
        $this->MontantConsommable = $MontantConsommable;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getLier(): Collection
    {
        return $this->lier;
    }

    public function addLier(Contacts $lier): self
    {
        if (!$this->lier->contains($lier)) {
            $this->lier[] = $lier;
        }

        return $this;
    }

    public function removeLier(Contacts $lier): self
    {
        if ($this->lier->contains($lier)) {
            $this->lier->removeElement($lier);
        }

        return $this;
    }

    public function getTechniciens(): ?Techniciens
    {
        return $this->techniciens;
    }

    public function setTechniciens(?Techniciens $techniciens): self
    {
        $this->techniciens = $techniciens;

        return $this;
    }

    /**
     * @return Collection|Machine[]
     */
    public function getMachines(): Collection
    {
        return $this->machines;
    }

    public function addMachine(Machine $machine): self
    {
        if (!$this->machines->contains($machine)) {
            $this->machines[] = $machine;
            $machine->addTechnique($this);
        }

        return $this;
    }

    public function removeMachine(Machine $machine): self
    {
        if ($this->machines->contains($machine)) {
            $this->machines->removeElement($machine);
            $machine->removeTechnique($this);
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

    public function __toString()
    {
        return $this->DateIntervention;
    }
}
