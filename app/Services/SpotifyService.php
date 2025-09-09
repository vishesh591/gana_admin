<?php

namespace App\Services;

class SpotifyService
{
    private $clientId;
    private $clientSecret;
    private $accessToken;

    public function __construct()
    {
        $this->clientId = env('SPOTIFY_CLIENT_ID');
        $this->clientSecret = env('SPOTIFY_CLIENT_SECRET');
    }

    /**
     * Get access token using Client Credentials flow
     */
    private function getAccessToken()
    {
        if ($this->accessToken) {
            return $this->accessToken;
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://accounts.spotify.com/api/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => [
                'Authorization: Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
                'Content-Type: application/x-www-form-urlencoded'
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode === 200) {
            $data = json_decode($response, true);
            $this->accessToken = $data['access_token'];
            return $this->accessToken;
        }

        return false;
    }

    /**
     * Search for artists by name
     * @param string $query - Search query (e.g., "vishesh", "taylor swift")
     * @param int $limit - Number of results (default: 10, max: 50)
     * @return array
     */
    public function searchArtists($query, $limit = 10)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return [
                'success' => false,
                'data' => [],
                'error' => 'Unable to connect to Spotify API'
            ];
        }

        $query = urlencode(trim($query));
        $limit = min(max($limit, 1), 50); // Ensure limit is between 1-50

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.spotify.com/v1/search?q={$query}&type=artist&limit={$limit}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$accessToken}"
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode === 200) {
            $searchData = json_decode($response, true);
            $artists = [];

            if (isset($searchData['artists']['items'])) {
                foreach ($searchData['artists']['items'] as $artist) {
                    $artists[] = [
                        'id' => $artist['id'],
                        'name' => $artist['name'],
                        'followers' => $artist['followers']['total'],
                        'popularity' => $artist['popularity'],
                        'genres' => implode(', ', array_slice($artist['genres'], 0, 3)), // First 3 genres
                        'image' => !empty($artist['images']) ? $artist['images'][0]['url'] : null,
                        'spotify_url' => $artist['external_urls']['spotify']
                    ];
                }
            }

            return [
                'success' => true,
                'data' => $artists,
                'total' => count($artists),
                'error' => null
            ];
        } else {
            return [
                'success' => false,
                'data' => [],
                'total' => 0,
                'error' => 'Error searching Spotify artists'
            ];
        }
    }

    public function searchAppleMusicArtists($query, $limit = 10)
    {
        $query = urlencode(trim($query));
        $limit = min(max($limit, 1), 25); // Apple Music API limit is 25

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://itunes.apple.com/search?term={$query}&entity=musicArtist&limit={$limit}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'User-Agent: Mozilla/5.0 (compatible; ArtistSearch/1.0)'
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode === 200) {
            $searchData = json_decode($response, true);
            $artists = [];

            if (isset($searchData['results']) && !empty($searchData['results'])) {
                foreach ($searchData['results'] as $artist) {
                    // Extract primary genre from primaryGenreName
                    $primaryGenre = isset($artist['primaryGenreName']) ? $artist['primaryGenreName'] : 'Unknown';

                    $artists[] = [
                        'id' => (string)$artist['artistId'],
                        'name' => $artist['artistName'],
                        'followers' => 0,
                        'popularity' => 0,
                        'genres' => $primaryGenre,
                        'image' => $artist['artworkUrl100'] ?? 'data:image/svg+xml;base64,' . base64_encode('
                            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 300 300">
                            <defs>
                                <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#2d3748;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#1a202c;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect width="300" height="300" fill="url(#grad)"/>
                            <path d="M150 80 L150 200 M130 190 Q150 210 170 190" stroke="#718096" stroke-width="6" fill="none" stroke-linecap="round"/>
                            <circle cx="150" cy="190" r="20" fill="#718096"/>
                            </svg>'),
                        'apple_url' => $artist['artistLinkUrl'] ?? null
                    ];
                }
            }

            return [
                'success' => true,
                'data' => $artists,
                'total' => count($artists),
                'error' => null
            ];
        } else {
            return [
                'success' => false,
                'data' => [],
                'total' => 0,
                'error' => 'Error searching Apple Music artists'
            ];
        }
    }
}
