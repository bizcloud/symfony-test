<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
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
     * @ORM\ManyToOne(targetEntity=Maker::class, inversedBy="models")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maker;

    /**
     * @ORM\OneToMany(targetEntity=Generation::class, mappedBy="model")
     */
    private $generations;

    public function __construct()
    {
        $this->generations = new ArrayCollection();
    }

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

    public function getMaker(): ?Maker
    {
        return $this->maker;
    }

    public function setMaker(?Maker $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    /**
     * @return Collection|Generation[]
     */
    public function getGenerations(): Collection
    {
        return $this->generations;
    }

    public function addGeneration(Generation $generation): self
    {
        if (!$this->generations->contains($generation)) {
            $this->generations[] = $generation;
            $generation->setModel($this);
        }

        return $this;
    }

    public function removeGeneration(Generation $generation): self
    {
        if ($this->generations->contains($generation)) {
            $this->generations->removeElement($generation);
            // set the owning side to null (unless already changed)
            if ($generation->getModel() === $this) {
                $generation->setModel(null);
            }
        }

        return $this;
    }
}
