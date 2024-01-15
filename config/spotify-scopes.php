<?php

/**
 * Define all the scopes which should be used while creating a connection with the Spotify API
 */

return [
    'scope' => [
        
        /*
        | Ability to upload user-generated images.
        |
        */
        'ugc-image-upload',

        /*
        | Read the user's playback state (play, pause, etc.).
        |
        */
        'user-read-playback-state',

        /*
        | Modify the user's playback state (play, pause, etc.).
        |
        */
        'user-modify-playback-state',

        /*
        | Read the currently playing track for the user.
        |
        */
        'user-read-currently-playing',

        /*
        | Remote control of the Spotify app on other devices.
        |
        */
        'app-remote-control',

        /*
        | Access to the Spotify streaming service for music playback.
        |
        */
        'streaming',

        /*
        | Read the user's private playlists.
        |
        */
        'playlist-read-private',

        /*
        | Read the collaborative playlists the user is part of.
        |
        */
        'playlist-read-collaborative',

        /*
        | Modify the user's private playlists.
        |
        */
        'playlist-modify-private',

        /*
        | Modify the user's public playlists.
        |
        */
        'playlist-modify-public',

        /*
        | Follow and unfollow other users.
        |
        */
        'user-follow-modify',

        /*
        | Read the user's followed and followers.
        |
        */
        'user-follow-read',

        /*
        | Read the user's playback position in a track.
        |
        */
        'user-read-playback-position',

        /*
        | Read the user's top tracks and artists.
        |
        */
        'user-top-read',

        /*
        | Read the user's recently played tracks.
        |
        */
        'user-read-recently-played',

        /*
        | Add and remove tracks from the user's library.
        |
        */
        'user-modify-library',

        /*
        | Read the user's library (saved tracks, albums, etc.).
        |
        */
        'user-library-read',

        /*
        | Read the user's email address.
        |
        */
        'user-read-email',

        /*
        | Read the user's private information (e.g., display name, country, etc.).
        |
        */
        'user-read-private',
    ],
];
