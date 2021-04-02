<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ApiResource(
 *      normalizationContext={"groups"={"area:read"}},
 *  	denormalizationContext={"groups"={"area:write"}},
 *	attributes={
 * 		"pagination_items_per_page"=100
 *   }
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "name": "partial", "commune": "exact"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=AreaRepository::class)
 */
class Area
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
	 * @groups({"area:read","member:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
	 * @groups({"area:read","area:write","member:read"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="areas")
	 * @groups({"area:read","area:write"})
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @groups({"area:read","area:write"})
     */
    private $obs;

    /**
     * @ORM\OneToMany(targetEntity=Street::class, mappedBy="area")
     */
    private $streets;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="area")
     */
    private $members;

    public function __construct()
    {
        $this->streets = new ArrayCollection();
        $this->members = new ArrayCollection();
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

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): self
    {
        $this->commune = $commune;

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

    /**
     * @return Collection|Street[]
     */
    public function getStreets(): Collection
    {
        return $this->streets;
    }

    public function addStreet(Street $street): self
    {
        if (!$this->streets->contains($street)) {
            $this->streets[] = $street;
            $street->setArea($this);
        }

        return $this;
    }

    public function removeStreet(Street $street): self
    {
        if ($this->streets->contains($street)) {
            $this->streets->removeElement($street);
            // set the owning side to null (unless already changed)
            if ($street->getArea() === $this) {
                $street->setArea(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setArea($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getArea() === $this) {
                $member->setArea(null);
            }
        }

        return $this;
    }
}
