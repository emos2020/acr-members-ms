<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"commune:read"}},
 *  	denormalizationContext={"groups"={"commune:write"}},
 *	attributes={
 * 		"pagination_items_per_page"=100
 *   }
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "name": "partial"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=CommuneRepository::class)
 */
class Commune
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
	 * @groups({"commune:read","member:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
	 * @groups({"commune:read","commune:write","member:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
	 * @groups({"commune:read","commune:write"})
     */
    private $obs;

    /**
     * @ORM\ManyToOne(targetEntity=Town::class, inversedBy="communes")
     */
    private $town;

    /**
     * @ORM\OneToMany(targetEntity=Area::class, mappedBy="commune")
     */
    private $areas;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="commune")
     */
    private $members;

    /**
     * @ORM\OneToMany(targetEntity=StreetsZone::class, mappedBy="commune")
     */
    private $streetsZones;

    public function __construct()
    {
        $this->areas = new ArrayCollection();
        $this->members = new ArrayCollection();
        $this->streetsZones = new ArrayCollection();
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

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(?string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    public function getTown(): ?Town
    {
        return $this->town;
    }

    public function setTown(?Town $town): self
    {
        $this->town = $town;

        return $this;
    }

    /**
     * @return Collection|Area[]
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    public function addArea(Area $area): self
    {
        if (!$this->areas->contains($area)) {
            $this->areas[] = $area;
            $area->setCommune($this);
        }

        return $this;
    }

    public function removeArea(Area $area): self
    {
        if ($this->areas->contains($area)) {
            $this->areas->removeElement($area);
            // set the owning side to null (unless already changed)
            if ($area->getCommune() === $this) {
                $area->setCommune(null);
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
            $member->setCommune($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getCommune() === $this) {
                $member->setCommune(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StreetsZone[]
     */
    public function getStreetsZones(): Collection
    {
        return $this->streetsZones;
    }

    public function addStreetsZone(StreetsZone $streetsZone): self
    {
        if (!$this->streetsZones->contains($streetsZone)) {
            $this->streetsZones[] = $streetsZone;
            $streetsZone->setCommune($this);
        }

        return $this;
    }

    public function removeStreetsZone(StreetsZone $streetsZone): self
    {
        if ($this->streetsZones->contains($streetsZone)) {
            $this->streetsZones->removeElement($streetsZone);
            // set the owning side to null (unless already changed)
            if ($streetsZone->getCommune() === $this) {
                $streetsZone->setCommune(null);
            }
        }

        return $this;
    }
}
