<?php

namespace App\Entity;

use App\Repository\UsersLikedVacanciesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersLikedVacanciesRepository::class)]
class UsersLikedVacancies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vacancy $vacancyId = null;

    #[ORM\ManyToOne(inversedBy: 'usersLikedVacancies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $usersId = null;

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

    public function getUsersId(): ?Users
    {
        return $this->usersId;
    }

    public function setUsersId(?Users $usersId): self
    {
        $this->usersId = $usersId;

        return $this;
    }
}
