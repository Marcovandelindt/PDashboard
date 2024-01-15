<?php

namespace App\Http\Controllers\Spotify;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use Illuminate\Http\RedirectResponse;
use SpotifyWebAPI\Session as SpotifySession;

class SpotifyController extends Controller
{
    /**
     * Invoke action
     *
     * @param Request $request
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $spotifySession = new SpotifySession(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI'),
        );

        $spotifyWebApi = new SpotifyWebAPI();

        if ($request->get('code')) {
            $spotifySession->requestAccessToken($request->get('code'));
            $spotifyWebApi->setAccessToken($spotifySession->getAccessToken());

            $spotifyAccessToken = $spotifySession->getAccessToken();
            $spotifyRefreshToken = $spotifySession->getRefreshToken();

            // Store access token
            if (!empty($spotifyAccessToken)) {
                $spotifyAccessTokenSetting = Setting::where('name', 'spotify_access_token')->first();
                if (!empty($spotifyAccessTokenSetting)) {
                    $spotifyAccessTokenSetting->value = $spotifyAccessToken;
                    $spotifyAccessTokenSetting->save();
                }
            }

            // Store refresh token
            if (!empty($spotifyRefreshToken)) {
                $spotifyRefreshTokenSetting = Setting::where('name', 'spotify_refresh_token')->first();
                if (!empty($spotifyRefreshTokenSetting)) {
                    $spotifyRefreshTokenSetting->value = $spotifyRefreshToken;
                    $spotifyRefreshTokenSetting->save();
                }
            }

            return redirect()->route('music.index')->with([
                'status' => 'Spotify tokens zijn succesvol opgehaald',
            ]);
        }

        $scopeOptions = config('spotify-scopes.scope');

        return redirect()->to($spotifySession->getAuthorizeUrl($scopeOptions));
    }
}
