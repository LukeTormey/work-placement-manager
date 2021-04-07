<?php

namespace App\Entity;

use App\Repository\OrganizationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrganizationRepository::class)
 */
class Organization
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
     * @ORM\Column(type="string", length=255)
     */
    private $hiringmanager;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $staffno;

    /**
     * @ORM\ManyToOne(targetEntity=Jobs::class, inversedBy="deadline")
     */
    private $job;

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

    public function getHiringmanager(): ?string
    {
        return $this->hiringmanager;
    }

    public function setHiringmanager(string $hiringmanager): self
    {
        $this->hiringmanager = $hiringmanager;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStaffno(): ?int
    {
        return $this->staffno;
    }

    public function setStaffno(?int $staffno): self
    {
        $this->staffno = $staffno;

        return $this;
    }

    public function getJob(): ?Jobs
    {
        return $this->job;
    }

    public function setJob(?Jobs $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
