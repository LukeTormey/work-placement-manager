<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobsRepository::class)
 */
class Jobs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Organization::class, mappedBy="job")
     */
    private $deadline;

    public function __construct()
    {
        $this->deadline = new ArrayCollection();
    }

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

    /**
     * @return Collection|Organization[]
     */
    public function getDeadline(): Collection
    {
        return $this->deadline;
    }

    public function addDeadline(Organization $deadline): self
    {
        if (!$this->deadline->contains($deadline)) {
            $this->deadline[] = $deadline;
            $deadline->setJob($this);
        }

        return $this;
    }

    public function removeDeadline(Organization $deadline): self
    {
        if ($this->deadline->removeElement($deadline)) {
            // set the owning side to null (unless already changed)
            if ($deadline->getJob() === $this) {
                $deadline->setJob(null);
            }
        }
        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
