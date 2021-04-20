<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="students")
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $employed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $studentno;

    /**
     * @ORM\ManyToOne(targetEntity=Cv::class, inversedBy="students")
     */
    private $cv;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?User
    {
        return $this->email;
    }

    public function setEmail(?User $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmployed(): ?bool
    {
        return $this->employed;
    }

    public function setEmployed(?bool $employed): self
    {
        $this->employed = $employed;

        return $this;
    }

    public function getStudentno(): ?string
    {
        return $this->studentno;
    }

    public function setStudentno(?string $studentno): self
    {
        $this->studentno = $studentno;

        return $this;
    }

    public function getCv(): ?Cv
    {
        return $this->cv;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function setCv(?Cv $cv): self
    {
        $this->cv = $cv;

        return $this;
    }
}
