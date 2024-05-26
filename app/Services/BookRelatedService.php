<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookRelatedService {

    use ConsumesExternalService;

    /**
     * The base uri to consume the BookRelated service
     * @var string
     */
    public $baseUri;

    public function __construct() {
        $this->baseUri = config('services.bookRelated.base_uri');
    }

    /**
     * Obtain the full list of Books from Site2
     * @return string
     */
    public function obtainBooksRelated() {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Create one book using the BookRelated service
     * @return string
     */
    public function createBooks($data) {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Obtain one single book from the BookRelatedService
     * @return string
     */
    public function obtainBook($id) {
        return $this->performRequest('GET', "/books/{$id}");
    }

    /**
     * Update an instance of book using the BookRelated service
     * @return string
     */
    public function editBook($data, $id) {
        return $this->performRequest('PUT', "/books/{$id}", $data);
    }

    /**
     * Remove a single book using the BookRelated service
     * @return string
     */
    //public function deleteBook($id) {
    //    return $this->performRequest('DELETE', "/books/{$id}");
    //}

}