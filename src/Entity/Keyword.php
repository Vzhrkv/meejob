<?php

namespace App\Entity;

use App\Repository\KeywordRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KeywordRepository::class)]
class Keyword
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'keywordId', cascade: ['persist', 'remove'])]
    private ?KeywordVacancy $keywordVacancy = null;

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

    public function getKeywordVacancy(): ?KeywordVacancy
    {
        return $this->keywordVacancy;
    }

    public function setKeywordVacancy(KeywordVacancy $keywordVacancy): self
    {
        // set the owning side of the relation if necessary
        if ($keywordVacancy->getKeywordId() !== $this) {
            $keywordVacancy->setKeywordId($this);
        }

        $this->keywordVacancy = $keywordVacancy;

        return $this;
    }
}
