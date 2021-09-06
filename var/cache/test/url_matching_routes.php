<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/events' => [[['_route' => 'api_events_get', '_controller' => 'App\\Controller\\Api\\ApiController::getEvents'], null, ['GET' => 0], null, false, false, null]],
        '/api/artists' => [[['_route' => 'api_artists_get', '_controller' => 'App\\Controller\\Api\\ApiController::getArtists'], null, ['GET' => 0], null, false, false, null]],
        '/api/places' => [[['_route' => 'api_places_get', '_controller' => 'App\\Controller\\Api\\ApiController::getPlaces'], null, ['GET' => 0], null, false, false, null]],
        '/api/genres' => [[['_route' => 'api_genres_get', '_controller' => 'App\\Controller\\Api\\ApiController::getGenres'], null, ['GET' => 0], null, false, false, null]],
        '/api/dates' => [[['_route' => 'api_dates_get', '_controller' => 'App\\Controller\\Api\\ApiController::getDates'], null, ['GET' => 0], null, false, false, null]],
        '/admin/artist/browse' => [[['_route' => 'admin_artist_browse', '_controller' => 'App\\Controller\\ArtistController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/admin/artist/add' => [[['_route' => 'admin_artist_add', '_controller' => 'App\\Controller\\ArtistController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/event/browse' => [[['_route' => 'admin_event_browse', '_controller' => 'App\\Controller\\EventController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/admin/event/add' => [[['_route' => 'admin_event_add', '_controller' => 'App\\Controller\\EventController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/genre/browse' => [[['_route' => 'admin_genre_browse', '_controller' => 'App\\Controller\\GenreController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/admin/genre/add' => [[['_route' => 'admin_genre_add', '_controller' => 'App\\Controller\\GenreController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/place/browse' => [[['_route' => 'admin_place_browse', '_controller' => 'App\\Controller\\PlaceController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/admin/place/add' => [[['_route' => 'admin_place_add', '_controller' => 'App\\Controller\\PlaceController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin/user/browse' => [[['_route' => 'admin_user_browse', '_controller' => 'App\\Controller\\UserController::browse'], null, ['GET' => 0], null, false, false, null]],
        '/admin/user/add' => [[['_route' => 'admin_user_add', '_controller' => 'App\\Controller\\UserController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|pi/(?'
                        .'|events/([^/]++)(*:33)'
                        .'|artists/([^/]++)(*:56)'
                        .'|places/([^/]++)(*:78)'
                        .'|genres/([^/]++)(*:100)'
                    .')'
                    .'|dmin/(?'
                        .'|artist/(?'
                            .'|read/([^/]++)(*:140)'
                            .'|edit/([^/]++)(*:161)'
                            .'|delete/([^/]++)(*:184)'
                        .')'
                        .'|event/(?'
                            .'|read/([^/]++)(*:215)'
                            .'|edit/([^/]++)(*:236)'
                            .'|delete/([^/]++)(*:259)'
                        .')'
                        .'|genre/(?'
                            .'|read/([^/]++)(*:290)'
                            .'|edit/([^/]++)(*:311)'
                            .'|delete/([^/]++)(*:334)'
                        .')'
                        .'|place/(?'
                            .'|read/([^/]++)(*:365)'
                            .'|edit/([^/]++)(*:386)'
                            .'|delete/([^/]++)(*:409)'
                        .')'
                        .'|user/(?'
                            .'|read/([^/]++)(*:439)'
                            .'|edit/([^/]++)(*:460)'
                            .'|delete/(\\d+)(*:480)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        33 => [[['_route' => 'api_events_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getEvent'], ['slug'], ['GET' => 0], null, false, true, null]],
        56 => [[['_route' => 'api_artists_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getArtist'], ['slug'], ['GET' => 0], null, false, true, null]],
        78 => [[['_route' => 'api_places_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getPlace'], ['slug'], ['GET' => 0], null, false, true, null]],
        100 => [[['_route' => 'api_genres_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getGenre'], ['slug'], ['GET' => 0], null, false, true, null]],
        140 => [[['_route' => 'admin_artist_read', '_controller' => 'App\\Controller\\ArtistController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        161 => [[['_route' => 'admin_artist_edit', '_controller' => 'App\\Controller\\ArtistController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        184 => [[['_route' => 'admin_artist_delete', '_controller' => 'App\\Controller\\ArtistController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        215 => [[['_route' => 'admin_event_read', '_controller' => 'App\\Controller\\EventController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        236 => [[['_route' => 'admin_event_edit', '_controller' => 'App\\Controller\\EventController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        259 => [[['_route' => 'admin_event_delete', '_controller' => 'App\\Controller\\EventController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        290 => [[['_route' => 'admin_genre_read', '_controller' => 'App\\Controller\\GenreController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        311 => [[['_route' => 'admin_genre_edit', '_controller' => 'App\\Controller\\GenreController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        334 => [[['_route' => 'admin_genre_delete', '_controller' => 'App\\Controller\\GenreController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        365 => [[['_route' => 'admin_place_read', '_controller' => 'App\\Controller\\PlaceController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        386 => [[['_route' => 'admin_place_edit', '_controller' => 'App\\Controller\\PlaceController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        409 => [[['_route' => 'admin_place_delete', '_controller' => 'App\\Controller\\PlaceController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        439 => [[['_route' => 'admin_user_read', '_controller' => 'App\\Controller\\UserController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        460 => [[['_route' => 'admin_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        480 => [
            [['_route' => 'admin_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
