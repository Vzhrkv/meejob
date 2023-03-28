<?php

namespace App\Entity;

use App\Repository\SocialMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocialMediaRepository::class)]
class SocialMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'socialMedia', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $whatsapp = null;

    #[ORM\Column(nullable: true)]
    private ?int $telegram = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vk = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ok = null;

    #[ORM\Column(nullable: true)]
    private ?int $viber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsersId(): ?Users
    {
        return $this->users_id;
    }

    public function setUsersId(Users $users_id): self
    {
        $this->users_id = $users_id;

        return $this;
    }

    public function getWhatsapp(): ?int
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(?int $whatsapp): self
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getTelegram(): ?int
    {
        return $this->telegram;
    }

    public function setTelegram(?int $telegram): self
    {
        $this->telegram = $telegram;

        return $this;
    }

    public function getVk(): ?string
    {
        return $this->vk;
    }

    public function setVk(?string $vk): self
    {
        $this->vk = $vk;

        return $this;
    }

    public function getOk(): ?string
    {
        return $this->ok;
    }

    public function setOk(?string $ok): self
    {
        $this->ok = $ok;

        return $this;
    }

    public function getViber(): ?int
    {
        return $this->viber;
    }

    public function setViber(?int $viber): self
    {
        $this->viber = $viber;

        return $this;
    }
}
