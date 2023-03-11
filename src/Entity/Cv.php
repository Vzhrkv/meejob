<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvRepository::class)]
class Cv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cvs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user_id = null;

    #[ORM\Column(length: 128)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 64)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\Column(length: 128)]
    private ?string $position = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $social_media = null;

    #[ORM\Column]
    private ?int $job_experience = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cv_photo_url = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $achievements = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(?Users $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getSocialMedia(): ?string
    {
        return $this->social_media;
    }

    public function setSocialMedia(?string $social_media): self
    {
        $this->social_media = $social_media;

        return $this;
    }

    public function getJobExperience(): ?int
    {
        return $this->job_experience;
    }

    public function setJobExperience(int $job_experience): self
    {
        $this->job_experience = $job_experience;

        return $this;
    }

    public function getCvPhotoUrl(): ?string
    {
        return $this->cv_photo_url;
    }

    public function setCvPhotoUrl(?string $cv_photo_url): self
    {
        $this->cv_photo_url = $cv_photo_url;

        return $this;
    }

    public function getAchievements(): ?string
    {
        return $this->achievements;
    }

    public function setAchievements(?string $achievements): self
    {
        $this->achievements = $achievements;

        return $this;
    }
}
