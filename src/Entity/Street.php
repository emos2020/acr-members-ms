<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StreetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"street:read"}},
 *  	denormalizationContext={"groups"={"street:write"}},
 *	attributes={
 * 		"pagination_items_per_page"=100
 *   }
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "name": "partial", "area": "exact"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=StreetRepository::class)
 */
class Street
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
	 * @groups({"street:read","member:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
	 * @groups({"street:read","street:write","member:read"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="streets")
     * @groups({"street:read","street:write"})
     */
    private $area;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @groups({"street:read","street:write"})
     */
    private $obs;

    /**
     * @ORM\ManyToOne(targetEntity=StreetsZone::class, inversedBy="streets")
     * @groups({"street:read","street:write"})
     */
    private $streetsZone;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="street")
     */
    private $members;

    public function __construct()
    {
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

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

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

    public function getStreetsZone(): ?StreetsZone
    {
        return $this->streetsZone;
    }

    public function setStreetsZone(?StreetsZone $streetsZone): self
    {
        $this->streetsZone = $streetsZone;

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
            $member->setStreet($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getStreet() === $this) {
                $member->setStreet(null);
            }
        }

        return $this;
    }
}
