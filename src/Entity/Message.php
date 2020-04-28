<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class MessageText{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\targetEntity="App\Entity\Clients"
     */
    private $NomClient;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\targetEntity="App\Entity\User"
     */
    private $Email;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2)
     */
    private $message;


    public function getNomClient(): ?Atelier
    {
        return $this->atelier;
    }

    public function setAtelier(?Atelier $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }
    
}