<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 * @UniqueEntity(fields={"name"})
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"events_get", "artists_get", "genres_get", "places_get", "events_dates_get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events_get", "artists_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups({"events_get", "artists_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"events_get", "artists_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $startDatetime;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"events_get", "artists_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $endDatetime;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"events_get", "artists_get", "genres_get", "places_get", "events_dates_get"})
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="events")
     * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
     * @Groups({"events_get", "genres_get", "artists_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $place;

    /**
     * @ORM\ManyToMany(targetEntity=Artist::class, inversedBy="events")
     * @ORM\GeneratedValue
     * @Groups({"events_get", "places_get", "events_dates_get"})
     * @Assert\Count(min=1)
     */
    private $artists;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDatetime(): ?\DateTimeInterface
    {
        return $this->startDatetime;
    }

    public function setStartDatetime(\DateTimeInterface $startDatetime): self
    {
        $this->startDatetime = $startDatetime;

        return $this;
    }

    public function getEndDatetime(): ?\DateTimeInterface
    {
        return $this->endDatetime;
    }

    public function setEndDatetime(\DateTimeInterface $endDatetime): self
    {
        $this->endDatetime = $endDatetime;

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

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return Collection|Artist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        $this->artists->removeElement($artist);

        return $this;
    }
}
