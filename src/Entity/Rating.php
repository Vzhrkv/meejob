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

    #[ORM\ManyToOne(inversedBy: 'ratings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Organization $organizationId = null;

    #[ORM\Column(nullable: true)]
    private ?float $mark = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganizationId(): ?Organization
    {
        return $this->organizationId;
    }

    public function setOrganizationId(?Organization $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }

    public function getMark(): ?float
    {
        return $this->mark;
    }

    public function setMark(?float $mark): self
    {
        $this->mark = $mark;

        return $this;
    }
}
