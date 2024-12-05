<?php

namespace App\Entity;

use App\Repository\SchoolQuizRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchoolQuizRepository::class)]
class SchoolQuiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private array $countries = [];

    #[ORM\Column]
    private array $priorities = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountries(): array
    {
        return $this->countries;
    }

    public function setCountries(array $countries): static
    {
        $this->countries = $countries;

        return $this;
    }

    public function getPriorities(): array
    {
        return $this->priorities;
    }

    public function setPriorities(array $priorities): static
    {
        $this->priorities = $priorities;

        return $this;
    }
}
