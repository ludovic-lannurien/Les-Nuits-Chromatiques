<?php

namespace App\DataFixtures\Data;

class UserData
{
    public static $userData = [
        ['email' => 'test@test.fr', 'roles' => 'ROLE_ADMIN', 'password' => 'test'],
        ['email' => 'admin@test.fr', 'roles' => 'ROLE_ADMIN', 'password' => 'admin'],
        ['email' => 'super-admin@test.fr', 'roles' => 'ROLE_SUPER_ADMIN', 'password' => 'super-admin']
    ];
}
