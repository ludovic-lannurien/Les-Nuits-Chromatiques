<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 * @UniqueEntity(fields={"name"})
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="integer", length=5)
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\Length(min=5, max=5)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $city;

    /**
     * @ORM\Column(type="float")
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $longitude;

    /**
     * @ORM\Column(type="text")
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"places_get", "artists_get", "events_get", "genres_get", "events_dates_get"})
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Event::class, mappedBy="place")
     * @Groups("places_get")
     */
    private $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setPlace($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getPlace() === $this) {
                $event->setPlace(null);
            }
        }

        return $this;
    }
}
