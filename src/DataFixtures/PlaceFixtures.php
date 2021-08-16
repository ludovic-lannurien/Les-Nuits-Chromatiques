<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\PlaceData;
use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    private function truncate()
    {
        $this->connection->executeQuery('SET foreign_key_checks = 0');
        $this->connection->executeQuery('TRUNCATE TABLE artist');
        $this->connection->executeQuery('TRUNCATE TABLE event');
        $this->connection->executeQuery('TRUNCATE TABLE place');
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
            $place->setSlug('test');

            $manager->persist($place);
        };

        $manager->flush();
    }
}
