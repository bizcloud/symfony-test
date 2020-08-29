<?php

namespace App\Entity;

use App\DBAL\FuelEnumType;
use App\DBAL\TransmissionEnumType;
use App\Repository\AdvertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 */
class Advert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Generation::class, inversedBy="adverts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $generation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $vin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $engineVolume;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $odometer;

    /**
     * @ORM\Column(type="transmission_enum_type", nullable=true)
     */
    private $transmission;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $info;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="adverts")
     */
    private $color;

    /**
     * @ORM\Column(type="fuel_enum_type", nullable=true)
     */
    private $fuel;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="advert")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneration(): ?Generation
    {
        return $this->generation;
    }

    public function setGeneration(?Generation $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getEngineVolume(): ?int
    {
        return $this->engineVolume;
    }

    public function setEngineVolume(?int $engineVolume): self
    {
        $this->engineVolume = $engineVolume;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(?int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getOdometer(): ?int
    {
        return $this->odometer;
    }

    public function setOdometer(?int $odometer): self
    {
        $this->odometer = $odometer;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }


    public function getTransmission(): ?TransmissionEnumType
    {
        return $this->transmission;
    }

    public function setTransmission(?TransmissionEnumType $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getFuel(): ?FuelEnumType
    {
        return $this->fuel;
    }

    public function setFuel(?FuelEnumType $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setAdvert($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getAdvert() === $this) {
                $image->setAdvert(null);
            }
        }

        return $this;
    }

}
