<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use App\Entity\Event;
use App\Entity\Genre;
use App\Entity\Place;
use App\Entity\Artist;
use App\Service\MySlugger;
use Doctrine\DBAL\Connection;
use App\DataFixtures\Data\UserData;
use App\DataFixtures\Data\EventData;
use App\DataFixtures\Data\GenreData;
use App\DataFixtures\Data\PlaceData;
use App\DataFixtures\Data\ArtistData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $connection;
    private $mySlugger;
    private $passwordHasher;

    public function __construct(Connection $connection, MySlugger $mySlugger, UserPasswordHasherInterface $passwordHasher)
    {
        $this->connection = $connection;
        $this->mySlugger = $mySlugger;
        $this->passwordHasher = $passwordHasher;
    }

    private function truncate()
    {
        $this->connection->executeQuery('SET foreign_key_checks = 0');
        $this->connection->executeQuery('TRUNCATE TABLE artist');
        $this->connection->executeQuery('TRUNCATE TABLE event');
        $this->connection->executeQuery('TRUNCATE TABLE place');
        $this->connection->executeQuery('TRUNCATE TABLE genre');
        $this->connection->executeQuery('TRUNCATE TABLE user');
    }

    public function load(ObjectManager $manager)
    {
        $this->truncate();

        foreach (PlaceData::$placeData as $data) {
            $place = new Place();

            $place->setName($data['name']);
            $place->setAddress($data['address']);
            $place->setZipCode(21000);
            $place->setCity('Dijon');
            $place->setLatitude($data['latitude']);
            $place->setLongitude($data['longitude']);
            $place->setDescription($data['description']);
            $place->setPicture($data['picture']);
            $place->setSlug($this->mySlugger->slugify($place->getName()));

            $manager->persist($place);
        };

        $eventsList = [];

        foreach (EventData::$eventData as $data) {
            $event = new Event();

            $event->setName($data['name']);
            $event->setStartDatetime(new DateTime($data['start_datetime']));
            $event->setEndDatetime(new DateTime($data['end_datetime']));
            $event->setDescription($data['description']);
            $event->setSlug($this->mySlugger->slugify($event->getName()));

            $eventsList[] = $event;

            $manager->persist($event);
        };

        $genresList = [];

        foreach (GenreData::$genreData as $data) {
            $genre = new Genre();

            $genre->setName($data['name']);
            $genre->setSlug($this->mySlugger->slugify($genre->getName()));

            $genresList[] = $genre;

            $manager->persist($genre);
        }

        foreach (ArtistData::$artistData as $data) {
            $artist = new Artist();

            $artist->setFirstname($data['firstname']);
            $artist->setLastname($data['lastname']);
            $artist->setPicture($data['picture']);
            $artist->setDescription($data['description']);
            $artist->setVideoLink($data['videolink']);

            for ($i = 1; $i <= mt_rand(1, 2); $i++) {
                $artist->addGenre($genresList[array_rand($genresList)]);
            }

            for ($i = 1; $i <= mt_rand(1, 2); $i++) {
                $artist->addEvent($eventsList[array_rand($eventsList)]);
            }

            if (null === $artist->getLastname()) {
                $artist->setSlug($this->mySlugger->slugify($artist->getFirstname()));
            } else {
                $artist->setSlug($this->mySlugger->slugify(($artist->getFirstname()) . '-' . ($artist->getLastname())));
            }

            $manager->persist($artist);
        }

        foreach (UserData::$userData as $data) {
            $user = new User();

            $user->setEmail($data['email']);
            $user->setRoles([$data['roles']]);
            $user->setPassword($this->passwordHasher->hashPassword($user, $data['password']));

            $manager->persist($user);
        };

        $manager->flush();
    }
}
