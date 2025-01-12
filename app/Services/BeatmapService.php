<?php

namespace App\Services;

use App\Models\Beatmap;
use Illuminate\Support\Facades\Http;

class BeatmapService
{
    protected $osuApiService;
    protected $apiBaseUrl = 'https://osu.ppy.sh/api/v2/';

    public function __construct(OsuApiService $osuApiService)
    {
        $this->osuApiService = $osuApiService;
    }

    public function fetchAndStoreBeatmap($beatmapId)
    {
        $accessToken = $this->osuApiService->getAccessToken();

        $response = Http::withToken($accessToken)->get("{$this->apiBaseUrl}beatmaps/{$beatmapId}");

        if ($response->ok()) {
            $data = $response->json();

            Beatmap::updateOrCreate(
                ['beatmap_id' => $data['id']],
                [
                    'beatmapset_id' => $data['beatmapset_id'],
                    'title' => $data['beatmapset']['title'],
                    'version' => $data['version'],
                    'artist' => $data['beatmapset']['artist'],
                    'creator' => $data['beatmapset']['creator'],
                    'cover_card_url' => $data['beatmapset']['covers']['card'],
                    'bpm' => $data['bpm'],
                    'difficulty_rating' => $data['difficulty_rating'],
                    'ar' => $data['ar'],
                    'cs' => $data['cs'],
                    'accuracy' => $data['accuracy'],
                    'drain' => $data['drain'],
                    'total_length' => $data['total_length'], // song length ?????? api docs unclear change later or dont use
                    // 'stage_id' => $stageId,
                ]
            );

            return ['success' => true, 'message' => 'Beatmap saved successfully'];
        }

        return ['success' => false, 'message' => 'Failed to fetch beatmap data'];
    }
}
