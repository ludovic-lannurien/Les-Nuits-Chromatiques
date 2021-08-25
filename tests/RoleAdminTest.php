<?php

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoleAdminTest extends WebTestCase
{
    public function testGet($url): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);

        $user = $userRepository->findOneByEmail('admin@test.fr');
        // $user = $userRepository->findOneByRoles('ROLE_ADMIN');

        $client->loginUser($user);
        $client->request('GET', $url);

        $this->assertResponseIsSuccessful();
    }

    public function backendUrlsProvider()
    {
        // Event
        yield ['/admin/event/browse'];
        yield ['/admin/event/read/vernissage'];
        // yield ['GET', '/admin/event/edit/1'];
        // yield ['POST', '/admin/event/edit/1'];
        // yield ['GET', '/admin/event/add'];
        // yield ['POST', '/admin/event/add'];
        // @todo passer en POST
        // yield ['GET', '/admin/event/delete/1'];
        
        // Place
        yield ['/admin/place/browse'];
        yield ['/admin/place/read/la-vapeur'];
        // yield ['GET', '/admin/place/edit/1'];
        // yield ['POST', '/admin/place/edit/1'];
        // yield ['GET', '/admin/place/add'];
        // yield ['POST', '/admin/place/add'];
        // yield ['POST', '/admin/place/delete/1'];
        
        // Artist
        yield ['/admin/artist/browse'];
        yield ['/admin/artist/read/sapia'];
        // yield ['GET', '/admin/artist/edit/1'];
        // yield ['POST', '/admin/artist/edit/1'];
        // yield ['GET', '/admin/artist/add'];
        // yield ['POST', '/admin/artist/add'];
        // yield ['POST', '/admin/artist/delete/1'];

        // Genre
        yield ['/admin/genre/browse'];
        // yield ['GET', '/admin/genre/edit/1'];
        // yield ['POST', '/admin/genre/edit/1'];
        // yield ['GET', '/admin/genre/add'];
        // yield ['POST', '/admin/genre/add'];
        // yield ['POST', '/admin/genre/delete/1'];
    }
}