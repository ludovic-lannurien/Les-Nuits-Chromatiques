<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Service\MySlugger;
use App\DataFixtures\Data\ArtistData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArtistFixtures extends Fixture
{
    private $mySlugger;

    public function __construct(MySlugger $mySlugger)
    {
        $this->mySlugger = $mySlugger;
    }
    
    public function load(ObjectManager $manager)
    {
        foreach (ArtistData::$artistData as $data) {
            $artist = new Artist();

            $artist->setFirstname($data['firstname']);
            $artist->setLastname($data['lastname']);
            $artist->setPicture($data['picture']);
            $artist->setDescription($data['description']);
            $artist->setVideoLink($data['videolink']);
            $artist->setType($data['type']);

            if (null === $artist->getLastname()) {
                $artist->setSlug($this->mySlugger->slugify($artist->getFirstname()));
            } else {
                $artist->setSlug($this->mySlugger->slugify(($artist->getFirstname()) . '-' . ($artist->getLastname())));
            }

            $manager->persist($artist);
        }

        $manager->flush();
    }
}
