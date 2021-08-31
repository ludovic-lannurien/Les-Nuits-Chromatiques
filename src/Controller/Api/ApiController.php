<?php

namespace App\Controller\Api;

use App\Entity\Event;
use App\Entity\Genre;
use App\Entity\Place;
use App\Entity\Artist;
use App\Repository\EventRepository;
use App\Repository\GenreRepository;
use App\Repository\PlaceRepository;
use App\Repository\ArtistRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/events", name="api_events_get", methods="GET")
     */
    public function getEvents(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findAll();

        return $this->json($events, Response::HTTP_OK, [], ['groups' => 'events_get']);
    }

    /**
     * @Route("/api/events/{slug}", name="api_events_get_item", methods="GET")
     */
    public function getEvent(Event $event = null): Response
    {
        // 404
        if (null === $event) {
            return new JsonResponse(
                ["message" => "Évènement non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($event, Response::HTTP_OK, [], ['groups' => 'events_get']);
    }

    /**
     * @Route("/api/artists", name="api_artists_get", methods="GET")
     */
    public function getArtists(ArtistRepository $artistRepository): Response
    {
        $artists = $artistRepository->findAll();

        return $this->json($artists, Response::HTTP_OK, [], ['groups' => 'artists_get']);
    }

    /**
     * @Route("/api/artists/{slug}", name="api_artists_get_item", methods="GET")
     */
    public function getArtist(Artist $artist = null): Response
    {
        // 404
        if (null === $artist) {
            return new JsonResponse(
                ["message" => "Artiste non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($artist, Response::HTTP_OK, [], ['groups' => 'artists_get']);
    }
    
    /**
     * @Route("/api/places", name="api_places_get", methods="GET")
     */
    public function getPlaces(PlaceRepository $placeRepository): Response
    {
        $places = $placeRepository->findAll();

        return $this->json($places, Response::HTTP_OK, [], ['groups' => 'places_get']);
    }

    /**
     * @Route("/api/places/{slug}", name="api_places_get_item", methods="GET")
     */
    public function getPlace(Place $place = null): Response
    {
        // 404
        if (null === $place) {
            return new JsonResponse(
                ["message" => "Lieu non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($place, Response::HTTP_OK, [], ['groups' => 'places_get']);
    }

    /**
     * @Route("/api/genres", name="api_genres_get", methods="GET")
     */
    public function getGenres(GenreRepository $genreRepository): Response
    {
        $genres = $genreRepository->findAll();

        return $this->json($genres, Response::HTTP_OK, [], ['groups' => 'genres_get']);
    }

    /**
     * @Route("/api/genres/{slug}", name="api_genres_get_item", methods="GET")
     */
    public function getGenre(Genre $genre = null): Response
    {
        // 404
        if (null === $genre) {
            return new JsonResponse(
                ["message" => "Genre non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json($genre, Response::HTTP_OK, [], ['groups' => 'genres_get']);
    }

    /**
     * @Route("/api/dates", name="api_dates_get", methods="GET")
     */
    public function getDates(EventRepository $eventRepository): Response
    {
        $firstEvent = $eventRepository->findOneBy(
            [],
            ['startDatetime' => 'ASC']
        );

        $lastEvent = $eventRepository->findOneBy(
            [],
            ['endDatetime' => 'DESC']
        );

        // 404
        if (null === $firstEvent || null === $lastEvent || null === $firstEvent->getStartDatetime() || null === $lastEvent->getEndDatetime()) {
            return new JsonResponse(
                ["message" => "Évènement non trouvé"],
                Response::HTTP_NOT_FOUND
            );
        }

        /**
         * @var \DateTime
         */
        $startDate = clone $firstEvent->getStartDatetime();

        /**
         * @var \DateTime
         */
        $endDate = $lastEvent->getEndDatetime();

        $responseArray = [];

        // 404
        if (null === $startDate) {
            return new JsonResponse(
                ["message" => "Date non trouvée"],
                Response::HTTP_NOT_FOUND
            );
        }
        
        while ($startDate < $endDate) {
            $eventDates = $eventRepository->findByEventsDate($startDate);

            if (count($eventDates) > 0) {
                $responseArray[$startDate->format('Y-m-d')] = $eventDates;
            }

            $startDate->modify('+1 day');
        }

        return $this->json($responseArray, Response::HTTP_OK, [], ['groups' => 'events_dates_get']);
    }
}
