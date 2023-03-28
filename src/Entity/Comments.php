<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $usersId = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Organization $organizationId = null;

    #[ORM\Column]
    private ?bool $is_anonymous = null;

    #[ORM\Column(length: 1024)]
    private ?string $text = null;

    #[ORM\Column]
    private ?int $mark = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsersId(): ?Users
    {
        return $this->usersId;
    }

    public function setUsersId(?Users $usersId): self
    {
        $this->usersId = $usersId;

        return $this;
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

    public function isIsAnonymous(): ?bool
    {
        return $this->is_anonymous;
    }

    public function setIsAnonymous(bool $is_anonymous): self
    {
        $this->is_anonymous = $is_anonymous;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getMark(): ?int
    {
        return $this->mark;
    }

    public function setMark(int $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }
}
