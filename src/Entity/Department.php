<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ApiResource(
 *      normalizationContext={"groups"={"dept:read"}},
 *  	denormalizationContext={"groups"={"dept:write"}},
 *	attributes={
 * 		"pagination_items_per_page"=100
 *   }
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "wording": "partial", "commune": "exact"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
	 * @groups({"dept:read","member:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
	  @groups({"dept:read","dept:write","member:read"})
     */
    private $wording;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $obs;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="department")
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

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(string $wording): self
    {
        $this->wording = $wording;

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
            $member->setDepartment($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getDepartment() === $this) {
                $member->setDepartment(null);
            }
        }

        return $this;
    }
}
