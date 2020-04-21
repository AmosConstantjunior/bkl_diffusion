<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
class Clients extends User
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
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdresseClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumSiret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TelClient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="resident")
     */
    private $ville;

   

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contacts", mappedBy="clients")
     */
    private $contacts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Atelier", mappedBy="clients")
     */
    private $ateliers;

   
    public function __construct()
    {
        
        $this->contacts = new ArrayCollection();
        $this->ateliers = new ArrayCollection();
     
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(string $NomClient): self
    {
        $this->NomClient = $NomClient;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->AdresseClient;
    }

    public function setAdresseClient(string $AdresseClient): self
    {
        $this->AdresseClient = $AdresseClient;

        return $this;
    }

    public function getNumSiret(): ?string
    {
        return $this->NumSiret;
    }

    public function setNumSiret(string $NumSiret): self
    {
        $this->NumSiret = $NumSiret;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->TelClient;
    }

    public function setTelClient(string $TelClient): self
    {
        $this->TelClient = $TelClient;

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

    

    

    public function __toString()
    {
        return $this->NomClient;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contacts $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setClients($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getClients() === $this) {
                $contact->setClients(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Atelier[]
     */
    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Atelier $atelier): self
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers[] = $atelier;
            $atelier->setClients($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->contains($atelier)) {
            $this->ateliers->removeElement($atelier);
            // set the owning side to null (unless already changed)
            if ($atelier->getClients() === $this) {
                $atelier->setClients(null);
            }
        }

        return $this;
    }
}
