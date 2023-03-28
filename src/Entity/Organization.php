<?php

namespace App\Entity;

use App\Repository\OrganizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;

#[ORM\Entity(repositoryClass: OrganizationRepository::class)]
class Organization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'organizationId', targetEntity: OrganizationType::class, orphanRemoval: false)]
    private OrganizationType $type;

    #[ORM\Column(length: 256)]
    private ?string $url = null;

    #[ORM\Column(length: 512)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $employees = null;

    #[ORM\Column]
    private ?int $students = null;

    #[ORM\Column]
    private ?int $settlement_year = null;

    #[ORM\Column(length: 256)]
    private ?string $photo = null;

    #[ORM\OneToMany(mappedBy: 'organizationId', targetEntity: EducationCourse::class, orphanRemoval: true)]
    private Collection $educationCourses;

    #[ORM\OneToMany(mappedBy: 'organizationId', targetEntity: Comments::class, orphanRemoval: true)]
    private Collection $comments;

    #[ORM\OneToMany(mappedBy: 'organizationId', targetEntity: Rating::class, orphanRemoval: true)]
    private Collection $ratings;


    public function __construct()
    {
        $this->educationCourses = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->ratings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, EducationCourse>
     */
    public function getEducationCourses(): Collection
    {
        return $this->educationCourses;
    }

    public function addEducationCourse(EducationCourse $educationCourse): self
    {
        if (!$this->educationCourses->contains($educationCourse)) {
            $this->educationCourses->add($educationCourse);
            $educationCourse->setOrganizationId($this);
        }

        return $this;
    }

    public function removeEducationCourse(EducationCourse $educationCourse): self
    {
        if ($this->educationCourses->removeElement($educationCourse)) {
            // set the owning side to null (unless already changed)
            if ($educationCourse->getOrganizationId() === $this) {
                $educationCourse->setOrganizationId(null);
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
            $comment->setOrganizationId($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getOrganizationId() === $this) {
                $comment->setOrganizationId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rating>
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Rating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings->add($rating);
            $rating->setOrganizationId($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getOrganizationId() === $this) {
                $rating->setOrganizationId(null);
            }
        }

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

	/**
	 * @return OrganizationType
	 */
	public function getType(): ?OrganizationType {
		return $this->type;
	}
	
	/**
	 * @param OrganizationType $type 
	 * @return self
	 */
	public function setType(OrganizationType $type): self {
		$this->type = $type;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUrl(): ?string {
		return $this->url;
	}
	
	/**
	 * @param string|null $url 
	 * @return self
	 */
	public function setUrl(?string $url): self {
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAddress(): ?string {
		return $this->address;
	}
	
	/**
	 * @param string|null $address 
	 * @return self
	 */
	public function setAddress(?string $address): self {
		$this->address = $address;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getEmployees(): ?int {
		return $this->employees;
	}
	
	/**
	 * @param int|null $employees 
	 * @return self
	 */
	public function setEmployees(?int $employees): self {
		$this->employees = $employees;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getStudents(): ?int {
		return $this->students;
	}
	
	/**
	 * @param int|null $students 
	 * @return self
	 */
	public function setStudents(?int $students): self {
		$this->students = $students;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSettlement_year(): ?int {
		return $this->settlement_year;
	}
	
	/**
	 * @param int|null $settlement_year 
	 * @return self
	 */
	public function setSettlement_year(?int $settlement_year): self {
		$this->settlement_year = $settlement_year;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPhoto(): ?string {
		return $this->photo;
	}
	
	/**
	 * @param string|null $photo 
	 * @return self
	 */
	public function setPhoto(?string $photo): self {
		$this->photo = $photo;
		return $this;
	}
}
