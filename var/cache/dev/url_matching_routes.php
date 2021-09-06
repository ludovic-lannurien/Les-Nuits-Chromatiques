<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
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
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:159)'
                .')'
                .'|/a(?'
                    .'|pi/(?'
                        .'|events/([^/]++)(*:194)'
                        .'|artists/([^/]++)(*:218)'
                        .'|places/([^/]++)(*:241)'
                        .'|genres/([^/]++)(*:264)'
                    .')'
                    .'|dmin/(?'
                        .'|artist/(?'
                            .'|read/([^/]++)(*:304)'
                            .'|edit/([^/]++)(*:325)'
                            .'|delete/([^/]++)(*:348)'
                        .')'
                        .'|event/(?'
                            .'|read/([^/]++)(*:379)'
                            .'|edit/([^/]++)(*:400)'
                            .'|delete/([^/]++)(*:423)'
                        .')'
                        .'|genre/(?'
                            .'|read/([^/]++)(*:454)'
                            .'|edit/([^/]++)(*:475)'
                            .'|delete/([^/]++)(*:498)'
                        .')'
                        .'|place/(?'
                            .'|read/([^/]++)(*:529)'
                            .'|edit/([^/]++)(*:550)'
                            .'|delete/([^/]++)(*:573)'
                        .')'
                        .'|user/(?'
                            .'|read/([^/]++)(*:603)'
                            .'|edit/([^/]++)(*:624)'
                            .'|delete/(\\d+)(*:644)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        159 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        194 => [[['_route' => 'api_events_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getEvent'], ['slug'], ['GET' => 0], null, false, true, null]],
        218 => [[['_route' => 'api_artists_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getArtist'], ['slug'], ['GET' => 0], null, false, true, null]],
        241 => [[['_route' => 'api_places_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getPlace'], ['slug'], ['GET' => 0], null, false, true, null]],
        264 => [[['_route' => 'api_genres_get_item', '_controller' => 'App\\Controller\\Api\\ApiController::getGenre'], ['slug'], ['GET' => 0], null, false, true, null]],
        304 => [[['_route' => 'admin_artist_read', '_controller' => 'App\\Controller\\ArtistController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        325 => [[['_route' => 'admin_artist_edit', '_controller' => 'App\\Controller\\ArtistController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        348 => [[['_route' => 'admin_artist_delete', '_controller' => 'App\\Controller\\ArtistController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        379 => [[['_route' => 'admin_event_read', '_controller' => 'App\\Controller\\EventController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        400 => [[['_route' => 'admin_event_edit', '_controller' => 'App\\Controller\\EventController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        423 => [[['_route' => 'admin_event_delete', '_controller' => 'App\\Controller\\EventController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        454 => [[['_route' => 'admin_genre_read', '_controller' => 'App\\Controller\\GenreController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        475 => [[['_route' => 'admin_genre_edit', '_controller' => 'App\\Controller\\GenreController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        498 => [[['_route' => 'admin_genre_delete', '_controller' => 'App\\Controller\\GenreController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        529 => [[['_route' => 'admin_place_read', '_controller' => 'App\\Controller\\PlaceController::read'], ['slug'], ['GET' => 0], null, false, true, null]],
        550 => [[['_route' => 'admin_place_edit', '_controller' => 'App\\Controller\\PlaceController::edit'], ['slug'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        573 => [[['_route' => 'admin_place_delete', '_controller' => 'App\\Controller\\PlaceController::delete'], ['slug'], ['GET' => 0], null, false, true, null]],
        603 => [[['_route' => 'admin_user_read', '_controller' => 'App\\Controller\\UserController::read'], ['id'], ['GET' => 0], null, false, true, null]],
        624 => [[['_route' => 'admin_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        644 => [
            [['_route' => 'admin_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
