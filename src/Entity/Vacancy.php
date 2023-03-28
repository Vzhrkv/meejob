<?php

namespace App\Entity;

use App\Repository\VacancyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VacancyRepository::class)]
class Vacancy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'vacancyId', cascade: ['persist', 'remove'])]
    private ?KeywordVacancy $keywordVacancy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeywordVacancy(): ?KeywordVacancy
    {
        return $this->keywordVacancy;
    }

    public function setKeywordVacancy(KeywordVacancy $keywordVacancy): self
    {
        // set the owning side of the relation if necessary
        if ($keywordVacancy->getVacancyId() !== $this) {
            $keywordVacancy->setVacancyId($this);
        }

        $this->keywordVacancy = $keywordVacancy;

        return $this;
    }
}
