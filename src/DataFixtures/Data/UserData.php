<?php

namespace App\DataFixtures\Data;

class UserData
{
    public static $userData = [
        ['email' => 'admin@test.fr', 'roles' => 'ROLE_ADMIN', 'password' => 'admin'],
        ['email' => 'super-admin@test.fr', 'roles' => 'ROLE_SUPER_ADMIN', 'password' => 'super-admin']
    ];
}
