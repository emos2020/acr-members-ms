<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"member:read"}},
 *  	denormalizationContext={"groups"={"member:write"}},
 *	attributes={
 * 		"pagination_items_per_page"=100
 *   }
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "wording": "partial"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
	 * @groups({"member:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
	 * @groups({"member:read","member:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
	 * @groups({"member:read","member:write"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=100)
	 * @groups({"member:read","member:write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
	 * @groups({"member:read","member:write"})
     */
    private $quality;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
	 * @groups({"member:read","member:write"})
     */
    private $numAddress;

    /**
     * @ORM\ManyToOne(targetEntity=Street::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $street;

    /**
     * @ORM\ManyToOne(targetEntity=StreetsZone::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $streetsZone;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $area;

    /**
     * @ORM\Column(type="bigint", length=30, nullable=true)
	 * @groups({"member:read","member:write"})
     */
    private $phone1;

    /**
     * @ORM\Column(type="bigint", length=30, nullable=true)
	 * @groups({"member:read","member:write"})
     */
    private $phone2;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $department;

    /**
     * @ORM\Column(type="date", nullable=true)
	 * @groups({"member:read","member:write"})
     */
    private $arrivedDate;

    /**
     * @ORM\Column(type="datetime")
	 * @groups({"member:read","member:write"})
     */
    private $capturedDate;

    /**
     * @ORM\Column(type="string", length=12)
	 * @groups({"member:read","member:write"})
     */
    private $gender;

    /**
     * @ORM\Column(type="boolean")
	 * @groups({"member:read","member:write"})
     */
    private $sendOtherSms;

    /**
     * @ORM\Column(type="boolean")
	 * @groups({"member:read","member:write"})
     */
    private $sendCultSms;

    /**
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $commune;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Statuspec::class, inversedBy="members")
	 * @groups({"member:read","member:write"})
     */
    private $statuspec;

    public function __construct()
    {
        $this->status = new ArrayCollection();
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getQuality(): ?string
    {
        return $this->quality;
    }

    public function setQuality(?string $quality): self
    {
        $this->quality = $quality;

        return $this;
    }

    public function getNumAddress(): ?string
    {
        return $this->numAddress;
    }

    public function setNumAddress(?string $numAddress): self
    {
        $this->numAddress = $numAddress;

        return $this;
    }

    public function getStreet(): ?Street
    {
        return $this->street;
    }

    public function setStreet(?Street $street): self
    {
        $this->street = $street;

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

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): self
    {
        $this->phone1 = $phone1;

        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(string $phone2): self
    {
        $this->phone2 = $phone2;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getArrivedDate(): ?\DateTimeInterface
    {
        return $this->arrivedDate;
    }

    public function setArrivedDate(?\DateTimeInterface $arrivedDate): self
    {
        $this->arrivedDate = $arrivedDate;

        return $this;
    }

    public function getCapturedDate(): ?\DateTimeInterface
    {
        return $this->capturedDate;
    }

    public function setCapturedDate(\DateTimeInterface $capturedDate): self
    {
        $this->capturedDate = $capturedDate;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getSendOtherSms(): ?bool
    {
        return $this->sendOtherSms;
    }

    public function setSendOtherSms(bool $sendOtherSms): self
    {
        $this->sendOtherSms = $sendOtherSms;

        return $this;
    }

    public function getSendCultSms(): ?bool
    {
        return $this->sendCultSms;
    }

    public function setSendCultSms(bool $sendCultSms): self
    {
        $this->sendCultSms = $sendCultSms;

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

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatuspec(): ?Statuspec
    {
        return $this->statuspec;
    }

    public function setStatuspec(?Statuspec $statuspec): self
    {
        $this->statuspec = $statuspec;

        return $this;
    }
}
