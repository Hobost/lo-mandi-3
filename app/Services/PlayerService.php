<?php

namespace App\Services;

use App\Models\Player;
use Illuminate\Support\Facades\Http;

class PlayerService
{
    protected $osuApiService;
    protected $apiBaseUrl = 'https://osu.ppy.sh/api/v2/';

    public function __construct(OsuApiService $osuApiService)
    {
        $this->osuApiService = $osuApiService;
    }

    public function fetchAndStorePlayer($userId)
    {
        $accessToken = $this->osuApiService->getAccessToken();

        $response = Http::withToken($accessToken)->get("{$this->apiBaseUrl}users/{$userId}/osu");

        if ($response->ok()) {
            $data = $response->json();

            Player::updateOrCreate(
                ['osu_id' => $data['id']],
                [
                    'username' => $data['username'],
                    'rank' => $data['statistics']['global_rank'],
                    'pp' => $data['statistics']['pp'],
                    'country' => $data['country']['name'],
                    'profile_pic_url' => $data['avatar_url']
                ]
            );

            return ['success' => true, 'message' => 'Player saved successfully'];
        }

        return ['success' => false, 'message' => 'Failed to fetch player data'];
    }
}
