<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VisitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VisitRepository::class)
 */
class Visit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $scheduledDate;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $scheduledHour;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $visitedDate;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $visitedHour;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $visited;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $obs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScheduledDate(): ?\DateTimeInterface
    {
        return $this->scheduledDate;
    }

    public function setScheduledDate(?\DateTimeInterface $scheduledDate): self
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    public function getScheduledHour(): ?\DateTimeInterface
    {
        return $this->scheduledHour;
    }

    public function setScheduledHour(?\DateTimeInterface $scheduledHour): self
    {
        $this->scheduledHour = $scheduledHour;

        return $this;
    }

    public function getVisitedDate(): ?\DateTimeInterface
    {
        return $this->visitedDate;
    }

    public function setVisitedDate(?\DateTimeInterface $visitedDate): self
    {
        $this->visitedDate = $visitedDate;

        return $this;
    }

    public function getVisitedHour(): ?\DateTimeInterface
    {
        return $this->visitedHour;
    }

    public function setVisitedHour(?\DateTimeInterface $visitedHour): self
    {
        $this->visitedHour = $visitedHour;

        return $this;
    }

    public function getVisited(): ?bool
    {
        return $this->visited;
    }

    public function setVisited(?bool $visited): self
    {
        $this->visited = $visited;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }
}
