<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LibraryRelatedService {

    use ConsumesExternalService;

    /**
     * The base uri to consume the LibraryRelated service
     * @var string
     */
    public $baseUri;

    public function __construct() {
        $this->baseUri = config('services.userRelated.base_uri');
    }

    /**
     * Obtain the full list of libraries from Site1
     * @return string
     */
    public function obtainLibraries() {
        return $this->performRequest('GET', '/libraries');
    }

    /**
     * Create one library using the LibraryRelated service
     * @return string
     */
    public function createLibraries($data) {
        return $this->performRequest('POST', '/libraries', $data);
    }

    /**
     * Obtain one single library from the LibraryRelatedService
     * @return string
     */
    public function obtainLibrary($id) {
        return $this->performRequest('GET', "/libraries/{$id}");
    }

    /**
     * Update an instance of library using the LibraryRelated service
     * @return string
     */
    public function editLibrary($data, $id) {
        return $this->performRequest('PUT', "/libraries/{$id}", $data);
    }

    /**
     * Remove a single library using the LibraryRelated service
     * @return string
     */
    //public function deleteLibrary($id) {
    //    return $this->performRequest('DELETE', "/libraries/{$id}");
    //}
}