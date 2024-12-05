<?php

namespace App\Entity;

use App\Repository\RatingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $academicValue = 100;

    #[ORM\Column]
    private ?int $value = 100;

    #[ORM\Column]
    private ?int $campus = 100;

    #[ORM\Column]
    private ?int $security = 100;

    #[ORM\Column]
    private ?int $location = 100;

    #[ORM\Column]
    private ?int $professors = 100;

    #[ORM\OneToOne(inversedBy: 'rating', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?School $School = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcademicValue(): ?int
    {
        return $this->academicValue;
    }

    public function setAcademicValue(int $academicValue): static
    {
        $this->academicValue = $academicValue;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getCampus(): ?int
    {
        return $this->campus;
    }

    public function setCampus(int $campus): static
    {
        $this->campus = $campus;

        return $this;
    }

    public function getSecurity(): ?int
    {
        return $this->security;
    }

    public function setSecurity(int $security): static
    {
        $this->security = $security;

        return $this;
    }

    public function getLocation(): ?int
    {
        return $this->location;
    }

    public function setLocation(int $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getProfessors(): ?int
    {
        return $this->professors;
    }

    public function setProfessors(int $professors): static
    {
        $this->professors = $professors;

        return $this;
    }

    public function getSchool(): ?School
    {
        return $this->School;
    }

    public function setSchool(School $School): static
    {
        $this->School = $School;

        return $this;
    }
}
