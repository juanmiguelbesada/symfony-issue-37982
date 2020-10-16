<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeasonRepository::class)
 */
class Season
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SeasonPrice::class, mappedBy="season", orphanRemoval=true, indexBy="ticket_type_id", cascade={"PERSIST"})
     */
    private $prices;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
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

    /**
     * @return Collection|SeasonPrice[]
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function addPrice(SeasonPrice $price): self
    {
        if (!$this->prices->contains($price)) {
            $this->prices[] = $price;
            $price->setSeason($this);
        }

        return $this;
    }

    public function removePrice(SeasonPrice $price): self
    {
        if ($this->prices->contains($price)) {
            $this->prices->removeElement($price);
            // set the owning side to null (unless already changed)
            if ($price->getSeason() === $this) {
                $price->setSeason(null);
            }
        }

        return $this;
    }
}
