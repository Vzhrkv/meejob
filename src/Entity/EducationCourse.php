<?php

namespace App\Entity;

use App\Repository\EducationCourseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationCourseRepository::class)]
class EducationCourse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'educationCourses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Organization $organizationId = null;

    #[ORM\Column(length: 128)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $brief_description = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?float $duration = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $course_type = null;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getBriefDescription(): ?string
    {
        return $this->brief_description;
    }

    public function setBriefDescription(?string $brief_description): self
    {
        $this->brief_description = $brief_description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDuration(): ?float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCourseType(): ?string
    {
        return $this->course_type;
    }

    public function setCourseType(?string $course_type): self
    {
        $this->course_type = $course_type;

        return $this;
    }
}
