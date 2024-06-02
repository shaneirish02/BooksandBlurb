<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AllBooksApiService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the All Books API service
     * @var string
     */
    public $baseUri;

    /**
     * Create a new instance
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('services.allBooksApi.base_uri');
    }

    /**
     * Obtain the book details
     * @param string $title
     * @return string
     */
    public function obtainBook($title)
    {
        $url = "{$this->baseUri}/title/" . rawurlencode($title);

        $headers = [
            'x-rapidapi-key' => config('services.rapidApiKey.api_key'),
            'x-rapidapi-host' => parse_url($this->baseUri, PHP_URL_HOST),
        ];

        return $this->performRequest('GET', $url, [], $headers);
    }
}
