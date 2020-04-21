<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactsRepository")
 */
class Contacts
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
    private $NomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Poste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TelContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EmailContact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Atelier", inversedBy="representer")
     */
    private $atelier;

    
   

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FicheVisite", mappedBy="lier")
     */
    private $ficheVisites;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients", inversedBy="contacts")
     */
    private $clients;

    public function __construct()
    {
        $this->ficheVisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->NomContact;
    }

    public function setNomContact(string $NomContact): self
    {
        $this->NomContact = $NomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->PrenomContact;
    }

    public function setPrenomContact(string $PrenomContact): self
    {
        $this->PrenomContact = $PrenomContact;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->TelContact;
    }

    public function setTelContact(string $TelContact): self
    {
        $this->TelContact = $TelContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->EmailContact;
    }

    public function setEmailContact(string $EmailContact): self
    {
        $this->EmailContact = $EmailContact;

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
     * @return Collection|FicheVisite[]
     */
    public function getFicheVisites(): Collection
    {
        return $this->ficheVisites;
    }

    public function addFicheVisite(FicheVisite $ficheVisite): self
    {
        if (!$this->ficheVisites->contains($ficheVisite)) {
            $this->ficheVisites[] = $ficheVisite;
            $ficheVisite->addLier($this);
        }

        return $this;
    }

    public function removeFicheVisite(FicheVisite $ficheVisite): self
    {
        if ($this->ficheVisites->contains($ficheVisite)) {
            $this->ficheVisites->removeElement($ficheVisite);
            $ficheVisite->removeLier($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->NomContact;
        return $this->Poste;
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
}
