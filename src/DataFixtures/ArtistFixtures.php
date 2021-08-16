<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\Data\ArtistData;
use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach (ArtistData::$artistData as $data) {

                        // Nouvel artiste
                        $artist = new Artist();
                        $artist->setFirstname($data['firstname']);
                        $artist->setLastname($data['lastname']);
                        $artist->setPicture($data['picture']);
                        $artist->setDescription($data['description']);
                        $artist->setVideoLink($data['videolink']);
                        $artist->setType($data['type']);
                        $artist->setSlug('test');

            
                        // Doctrine Persist
                        $manager->persist($artist);
        }

        $manager->flush();
    }
}
