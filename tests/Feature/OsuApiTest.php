namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class OsuApiTest extends TestCase
{
    public function apitokentest()
    {
        $response = Http::post('https://osu.ppy.sh/oauth/token', [
            'grant_type' => 'client_credentials',
            'client_id' => env('OSU_CLIENT_ID'),
            'client_secret' => env('OSU_CLIENT_SECRET'),
            'scope' => 'public',
        ]);

        $this->assertArrayHasKey('access_token', $response->json());
    }
}
