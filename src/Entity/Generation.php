<?php

namespace App\Entity;

use App\Repository\GenerationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenerationRepository::class)
 */
class Generation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="generations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year_start;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year_end;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getYearStart(): ?int
    {
        return $this->year_start;
    }

    public function setYearStart(?int $year_start): self
    {
        $this->year_start = $year_start;

        return $this;
    }

    public function getYearEnd(): ?int
    {
        return $this->year_end;
    }

    public function setYearEnd(?int $year_end): self
    {
        $this->year_end = $year_end;

        return $this;
    }
}
