<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $first_name = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $middle_name = null;

    #[ORM\Column(length: 128)]
    private ?string $last_name = null;

    #[ORM\Column(length: 128)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $password = null;

    #[ORM\Column]
    private ?bool $is_admin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo_url = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Cv::class, orphanRemoval: true)]
    private Collection $cvs;

    #[ORM\OneToOne(mappedBy: 'users_id', cascade: ['persist', 'remove'])]
    private ?SocialMedia $socialMedia = null;

    #[ORM\OneToMany(mappedBy: 'users_id', targetEntity: PreviousJob::class, orphanRemoval: true)]
    private Collection $previousJobs;

    #[ORM\OneToMany(mappedBy: 'usersId', targetEntity: Comments::class, orphanRemoval: true)]
    private Collection $comments;

    #[ORM\OneToMany(mappedBy: 'usersId', targetEntity: UsersLikedVacancies::class, orphanRemoval: true)]
    private Collection $usersLikedVacancies;

    public function __construct()
    {
        $this->cvs = new ArrayCollection();
        $this->previousJobs = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->usersLikedVacancies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(?string $middle_name): self
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(?string $photo_url): self
    {
        $this->photo_url = $photo_url;

        return $this;
    }

    /**
     * @return Collection<int, Cv>
     */
    public function getCvs(): Collection
    {
        return $this->cvs;
    }

    public function addCv(Cv $cv): self
    {
        if (!$this->cvs->contains($cv)) {
            $this->cvs->add($cv);
            $cv->setUserId($this);
        }

        return $this;
    }

    public function removeCv(Cv $cv): self
    {
        if ($this->cvs->removeElement($cv)) {
            // set the owning side to null (unless already changed)
            if ($cv->getUserId() === $this) {
                $cv->setUserId(null);
            }
        }

        return $this;
    }

    public function getSocialMedia(): ?SocialMedia
    {
        return $this->socialMedia;
    }

    public function setSocialMedia(SocialMedia $socialMedia): self
    {
        // set the owning side of the relation if necessary
        if ($socialMedia->getUsersId() !== $this) {
            $socialMedia->setUsersId($this);
        }

        $this->socialMedia = $socialMedia;

        return $this;
    }

    /**
     * @return Collection<int, PreviousJob>
     */
    public function getPreviousJobs(): Collection
    {
        return $this->previousJobs;
    }

    public function addPreviousJob(PreviousJob $previousJob): self
    {
        if (!$this->previousJobs->contains($previousJob)) {
            $this->previousJobs->add($previousJob);
            $previousJob->setUsersId($this);
        }

        return $this;
    }

    public function removePreviousJob(PreviousJob $previousJob): self
    {
        if ($this->previousJobs->removeElement($previousJob)) {
            // set the owning side to null (unless already changed)
            if ($previousJob->getUsersId() === $this) {
                $previousJob->setUsersId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setUsersId($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUsersId() === $this) {
                $comment->setUsersId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UsersLikedVacancies>
     */
    public function getUsersLikedVacancies(): Collection
    {
        return $this->usersLikedVacancies;
    }

    public function addUsersLikedVacancy(UsersLikedVacancies $usersLikedVacancy): self
    {
        if (!$this->usersLikedVacancies->contains($usersLikedVacancy)) {
            $this->usersLikedVacancies->add($usersLikedVacancy);
            $usersLikedVacancy->setUsersId($this);
        }

        return $this;
    }

    public function removeUsersLikedVacancy(UsersLikedVacancies $usersLikedVacancy): self
    {
        if ($this->usersLikedVacancies->removeElement($usersLikedVacancy)) {
            // set the owning side to null (unless already changed)
            if ($usersLikedVacancy->getUsersId() === $this) {
                $usersLikedVacancy->setUsersId(null);
            }
        }

        return $this;
    }
}
