<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\PlaceData;
use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
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
