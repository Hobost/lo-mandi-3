<?php

namespace App\Providers\Socialite;

use GuzzleHttp\ClientInterface;
use SocialiteProviders\Manager\Oauth2\AbstractProvider;
use SocialiteProviders\Manager\Oauth2\User;

class OsuProvider extends AbstractProvider
{
    public function getOsuUrl(): string
    {
        return 'https://osu.ppy.sh/oauth';
    }

    protected function getAuthUrl($state): string
    {
        return $this->buildAuthUrlFromBase($this->getOsuUrl() . '/authorize', $state);
    }

    protected function getTokenUrl(): string
    {
        return $this->getOsuUrl() . '/token';
    }

    protected function getUserByToken($token): array
    {
        $response = $this->getHttpClient()->get('https://osu.ppy.sh/api/v2/me', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user): User
    {
        return (new User())->setRaw($user)->map([
            'osu_user_id' => $user['id'],
            'username' => $user['username'],
            'rank' => $user['statistics']['global_rank'],
            'pp' => $user['statistics']['pp'],
            'country' => $user['country']['name'],
            'avatar_url' => $user['avatar_url'],
        ]);
    }
}