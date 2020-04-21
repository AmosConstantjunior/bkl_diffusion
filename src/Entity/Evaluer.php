<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvaluerRepository")
 */
class Evaluer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conclusion;

    /**
     * @ORM\Column(type="text")
     */
    private $Action;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Attestation", inversedBy="evaluers")
     */
    private $evalu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Criteres", inversedBy="evaluers")
     */
    private $evaluation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): self
    {
        $this->Note = $Note;

        return $this;
    }

    public function getConclusion(): ?string
    {
        return $this->conclusion;
    }

    public function setConclusion(string $conclusion): self
    {
        $this->conclusion = $conclusion;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->Action;
    }

    public function setAction(string $Action): self
    {
        $this->Action = $Action;

        return $this;
    }

    public function getEvalu(): ?Attestation
    {
        return $this->evalu;
    }

    public function setEvalu(?Attestation $evalu): self
    {
        $this->evalu = $evalu;

        return $this;
    }

    public function getEvaluation(): ?Criteres
    {
        return $this->evaluation;
    }

    public function setEvaluation(?Criteres $evaluation): self
    {
        $this->evaluation = $evaluation;

        return $this;
    }
}
