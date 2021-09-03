<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArtistRepository::class)
 */
class Artist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="text")
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $picture;

    /**
     * @ORM\Column(type="text")
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $videoLink;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"artists_get", "events_get", "genres_get", "places_get", "events_dates_get"})
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="artists")
     * @Groups({"artists_get", "genres_get"})
     * @Assert\NotBlank
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="artists")
     * @Groups({"artists_get", "events_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     * @Assert\Count(min=1)
     */
    private $genres;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->genres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(?string $videoLink): self
    {
        $this->videoLink = $videoLink;

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
            $event->addArtist($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removeArtist($this);
        }

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genres->removeElement($genre)) {
            $genre->removeArtist($this);
        }

        return $this;
    }
}
