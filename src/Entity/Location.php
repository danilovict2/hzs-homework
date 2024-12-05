<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $lat = null;

    #[ORM\Column]
    private ?float $lng = null;

    /**
     * @var Collection<int, School>
     */
    #[ORM\OneToMany(targetEntity: School::class, mappedBy: 'location')]
    private Collection $schools;

    public function __construct()
    {
        $this->schools = new ArrayCollection();
    }

    public function __toString() : string {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): static
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): static
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return Collection<int, School>
     */
    public function getSchools(): Collection
    {
        return $this->schools;
    }

    public function addSchool(School $school): static
    {
        if (!$this->schools->contains($school)) {
            $this->schools->add($school);
            $school->setLocation($this);
        }

        return $this;
    }

    public function removeSchool(School $school): static
    {
        if ($this->schools->removeElement($school)) {
            // set the owning side to null (unless already changed)
            if ($school->getLocation() === $this) {
                $school->setLocation(null);
            }
        }

        return $this;
    }
}
