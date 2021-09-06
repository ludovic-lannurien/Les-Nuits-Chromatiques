<?php

namespace App\Tests\Back\Unit;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoleSuperAdminTest extends WebTestCase
{
    /**
     * @dataProvider hasAccessUrls
     */
    public function testHasAccess($method, $url): void
    {
        $client = self::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);

        $user = $userRepository->findOneByEmail('super-admin@test.fr');

        $client->loginUser($user);

        $client->request($method, $url);

        $this->assertResponseIsSuccessful();
    }

    public function hasAccessUrls()
    {
        // Event
        yield ['GET', '/admin/event/browse'];
        yield ['GET', '/admin/event/read/vernissage'];
        yield ['GET', '/admin/event/edit/vernissage'];
        yield ['GET', '/admin/event/add'];
        yield ['POST', '/admin/event/edit/vernissage'];
        yield ['POST', '/admin/event/add'];
        
        // Place
        yield ['GET', '/admin/place/browse'];
        yield ['GET', '/admin/place/read/la-vapeur'];
        yield ['GET', '/admin/place/edit/la-vapeur'];
        yield ['GET', '/admin/place/add'];
        yield ['POST', '/admin/place/edit/la-vapeur'];
        yield ['POST', '/admin/place/add'];
                
        // Artist
        yield ['GET', '/admin/artist/browse'];
        yield ['GET', '/admin/artist/read/sapia'];
        yield ['GET', '/admin/artist/edit/sapia'];
        yield ['GET', '/admin/artist/add'];
        yield ['POST', '/admin/artist/edit/sapia'];
        yield ['POST', '/admin/artist/add'];

        // Genre
        yield ['GET', '/admin/genre/browse'];
        yield ['GET', '/admin/genre/read/musique'];
        yield ['GET', '/admin/genre/edit/musique'];
        yield ['GET', '/admin/genre/add'];
        yield ['POST', '/admin/genre/edit/musique'];
        yield ['POST', '/admin/genre/add'];

        // User
        yield ['GET', '/admin/user/browse'];
        yield ['GET', '/admin/user/read/1'];
        yield ['GET', '/admin/user/edit/1'];
        yield ['GET', '/admin/user/add'];
        yield ['POST', '/admin/user/edit/1'];
        yield ['POST', '/admin/user/add'];
    }

    /**
     * @dataProvider deleteUrlProvider
     */
    public function testDelete($url): void
    {
        $client = self::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);

        $user = $userRepository->findOneByEmail('super-admin@test.fr');

        $client->loginUser($user);

        $client->request('GET', $url);

        $this->assertResponseRedirects();
    }

    public function deleteUrlProvider()
    {
        // Event
        yield ['/admin/event/delete/lumiere-sur-cour'];
                
        // Artist
        yield ['/admin/artist/delete/ketbi'];

        // Genre
        yield ['/admin/genre/delete/musique'];

        // User
        yield ['/admin/user/delete/1'];
    }
}