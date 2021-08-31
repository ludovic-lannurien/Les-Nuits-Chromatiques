<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 * @UniqueEntity(fields={"name"})
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"genres_get", "artists_get", "events_get", "places_get", "events_dates_get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"genres_get", "artists_get", "events_get", "places_get", "events_dates_get"})
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"genres_get", "artists_get", "events_get", "places_get", "events_dates_get"})
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Artist::class, mappedBy="genres")
     * @Groups("genres_get")
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
            $artist->addGenre($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        $this->artist->removeElement($artist);

        return $this;
    }
}
