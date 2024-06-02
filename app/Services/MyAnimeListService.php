<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class MyAnimeListService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the MyAnimeList service
     * @var string
     */
    public $baseUri;

    /**
     * Create a new instance
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('services.myAnimeList.base_uri');
    }

    /**
     * Get manga recommendations from MyAnimeList API
     * @param int $page
     * @return string
     */
    public function getMangaRecommendations($page = 1)
    {
        $endpoint = "/v2/manga/recommendations";

        $query = [
            'p' => $page,
        ];

        $headers = [
            'x-rapidapi-key' => config('services.rapidApiKey.api_key'),
            'x-rapidapi-host' => parse_url($this->baseUri, PHP_URL_HOST),
        ];

        return $this->performRequest('GET', $endpoint, $query, $headers);
    }

    /**
     * Get manga details from MyAnimeList API by ID
     * @param int $mangaId
     * @return string
     */
    public function getMangaDetailsById($mangaId)
    {
        $endpoint = "/manga/{$mangaId}";

        $headers = [
            'x-rapidapi-key' => config('services.rapidApiKey.api_key'),
            'x-rapidapi-host' => parse_url($this->baseUri, PHP_URL_HOST),
        ];

        return $this->performRequest('GET', $endpoint, [], $headers);
    }
}
