<?php

namespace App\Entity;

use App\Repository\KeywordVacancyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KeywordVacancyRepository::class)]
class KeywordVacancy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'keywordVacancy', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vacancy $vacancyId = null;

    #[ORM\OneToOne(inversedBy: 'keywordVacancy', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Keyword $keywordId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVacancyId(): ?Vacancy
    {
        return $this->vacancyId;
    }

    public function setVacancyId(Vacancy $vacancyId): self
    {
        $this->vacancyId = $vacancyId;

        return $this;
    }

    public function getKeywordId(): ?Keyword
    {
        return $this->keywordId;
    }

    public function setKeywordId(Keyword $keywordId): self
    {
        $this->keywordId = $keywordId;

        return $this;
    }
}
