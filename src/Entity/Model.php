<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelRepository")
 */
class Model
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="nom_model", length=255)
     */
    private $NomModel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Machine", mappedBy="model")
     */
    private $modeler;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="marquer")
     */
    private $marque;

    public function __construct()
    {
        $this->modeler = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomModel(): ?string
    {
        return $this->NomModel;
    }

    public function setNomModel(string $NomModel): self
    {
        $this->NomModel = $NomModel;

        return $this;
    }

    /**
     * @return Collection|Machine[]
     */
    public function getModeler(): Collection
    {
        return $this->modeler;
    }

    public function addModeler(Machine $modeler): self
    {
        if (!$this->modeler->contains($modeler)) {
            $this->modeler[] = $modeler;
            $modeler->setModel($this);
        }

        return $this;
    }

    public function removeModeler(Machine $modeler): self
    {
        if ($this->modeler->contains($modeler)) {
            $this->modeler->removeElement($modeler);
            // set the owning side to null (unless already changed)
            if ($modeler->getModel() === $this) {
                $modeler->setModel(null);
            }
        }

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }
    public function __toString()
    {
        return $this->NomModel;
    }
}
