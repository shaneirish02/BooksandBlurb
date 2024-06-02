<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookFinderService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Book Finder service
     * @var string
     */
    public $baseUri;

    /**
     * Create a new instance
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('services.bookFinder.base_uri');
    }

    /**
     * Search for books using Book Finder API
     * @param string|null $series
     * @param string|null $bookType
     * @param string|null $author
     * @return string
     */
    public function searchBooks($series = null, $bookType = null, $author = null)
    {
        $query = [
            'series' => $series,
            'book_type' => $bookType,
            'author' => $author,
        ];

        $headers = [
            'x-rapidapi-key' => config('services.rapidApiKey.api_key'),
            'x-rapidapi-host' => parse_url($this->baseUri, PHP_URL_HOST),
        ];

        return $this->performRequest('GET', '/api/search', $query, $headers);
    }
}
