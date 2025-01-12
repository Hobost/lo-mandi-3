<?php

namespace App\Services;

use App\Models\Player;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OsuApiService
{
    protected $apiBaseUrl = 'https://osu.ppy.sh/api/v2/';

    /**
     * get/refresh access token.
     */
    public function getAccessToken()
    {
        // check if token exists in cache
        if (Cache::has('osu_access_token')) {
            return Cache::get('osu_access_token');
        }

        // req new token if not cahced yet
        $response = Http::post('https://osu.ppy.sh/oauth/token', [
            'grant_type' => 'client_credentials',
            'client_id' => env('OSU_CLIENT_ID'),
            'client_secret' => env('OSU_CLIENT_SECRET'),
            'scope' => 'public',
        ]);

        $data = $response->json();

        // cache token with expiry time
        Cache::put('osu_access_token', $data['access_token'], $data['expires_in'] - 60);

        return $data['access_token'];
    }

    // below moved to seperate services

    public function fetchPlayerData($userId)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->get("{$this->apiBaseUrl}users/{$userId}");

        return $response->json();
    }

    public function fetchBeatmapData($beatmapId)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->get("{$this->apiBaseUrl}beatmaps/{$beatmapId}");

        return $response->json();
    }
    
    public function fetchAndSavePlayerData($userId)
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->get("{$this->apiBaseUrl}users/{$userId}");

        $data = $response->json();

        $player = Player::updateOrCreate(
            ['osu_id' => $data['id']],
            [
                'username' => $data['username'],
                'rank' => $data['statistics']['global_rank'],
                'pp' => $data['statistics']['pp'],
                'country' => $data['country']['name'],
                'profile_pic_url' => $data['avatar_url']
            ]
        );

        return $player;
    }
}

