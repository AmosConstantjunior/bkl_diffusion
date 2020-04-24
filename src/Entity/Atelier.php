<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AtelierRepository")
 */
class Atelier
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
    private $AdresseAtelier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EmailAdresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomCarrosserie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $certifier;

  
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="lieu")
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contrats", inversedBy="contracter")
     */
    private $contrats;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Attestation", mappedBy="atelier")
     */
    private $attester;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contacts", mappedBy="atelier")
     */
    private $representer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Machine", mappedBy="atelier")
     */
    private $Situer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FicheVisite", mappedBy="atelier")
     */
    private $ficher;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="ateliers")
     */
    private $clients;

    /**
     * @ORM\Column(type="boolean")
     */
    private $attesterCQS;

    public function __construct()
    {
        $this->attester = new ArrayCollection();
        $this->representer = new ArrayCollection();
        $this->Situer = new ArrayCollection();
        $this->ficher = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseAtelier(): ?string
    {
        return $this->AdresseAtelier;
    }

    public function setAdresseAtelier(string $AdresseAtelier): self
    {
        $this->AdresseAtelier = $AdresseAtelier;

        return $this;
    }

    public function getEmailAdresse(): ?string
    {
        return $this->EmailAdresse;
    }

    public function setEmailAdresse(string $EmailAdresse): self
    {
        $this->EmailAdresse = $EmailAdresse;

        return $this;
    }

    public function getNomCarrosserie(): ?string
    {
        return $this->NomCarrosserie;
    }

    public function setNomCarrosserie(string $NomCarrosserie): self
    {
        $this->NomCarrosserie = $NomCarrosserie;

        return $this;
    }

    public function getCertifier(): ?bool
    {
        return $this->certifier;
    }

    public function setCertifier(bool $certifier): self
    {
        $this->certifier = $certifier;

        return $this;
    }

   

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getContrats(): ?Contrats
    {
        return $this->contrats;
    }

    public function setContrats(?Contrats $contrats): self
    {
        $this->contrats = $contrats;

        return $this;
    }

    /**
     * @return Collection|Attestation[]
     */
    public function getAttester(): Collection
    {
        return $this->attester;
    }

    public function addAttester(Attestation $attester): self
    {
        if (!$this->attester->contains($attester)) {
            $this->attester[] = $attester;
            $attester->setAtelier($this);
        }

        return $this;
    }

    public function removeAttester(Attestation $attester): self
    {
        if ($this->attester->contains($attester)) {
            $this->attester->removeElement($attester);
            // set the owning side to null (unless already changed)
            if ($attester->getAtelier() === $this) {
                $attester->setAtelier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getRepresenter(): Collection
    {
        return $this->representer;
    }

    public function addRepresenter(Contacts $representer): self
    {
        if (!$this->representer->contains($representer)) {
            $this->representer[] = $representer;
            $representer->setAtelier($this);
        }

        return $this;
    }

    public function removeRepresenter(Contacts $representer): self
    {
        if ($this->representer->contains($representer)) {
            $this->representer->removeElement($representer);
            // set the owning side to null (unless already changed)
            if ($representer->getAtelier() === $this) {
                $representer->setAtelier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Machine[]
     */
    public function getSituer(): Collection
    {
        return $this->Situer;
    }

    public function addSituer(Machine $situer): self
    {
        if (!$this->Situer->contains($situer)) {
            $this->Situer[] = $situer;
            $situer->setAtelier($this);
        }

        return $this;
    }

    public function removeSituer(Machine $situer): self
    {
        if ($this->Situer->contains($situer)) {
            $this->Situer->removeElement($situer);
            // set the owning side to null (unless already changed)
            if ($situer->getAtelier() === $this) {
                $situer->setAtelier(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->NomCarrosserie;
    }

    /**
     * @return Collection|FicheVisite[]
     */
    public function getFicher(): Collection
    {
        return $this->ficher;
    }

    public function addFicher(FicheVisite $ficher): self
    {
        if (!$this->ficher->contains($ficher)) {
            $this->ficher[] = $ficher;
            $ficher->setAtelier($this);
        }

        return $this;
    }

    public function removeFicher(FicheVisite $ficher): self
    {
        if ($this->ficher->contains($ficher)) {
            $this->ficher->removeElement($ficher);
            // set the owning side to null (unless already changed)
            if ($ficher->getAtelier() === $this) {
                $ficher->setAtelier(null);
            }
        }

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getAttesterCQS(): ?bool
    {
        return $this->attesterCQS;
    }

    public function setAttesterCQS(bool $attesterCQS): self
    {
        $this->attesterCQS = $attesterCQS;

        return $this;
    }
}
