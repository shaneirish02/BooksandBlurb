<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ReviewRelatedService {

    use ConsumesExternalService;

    /**
     * The base uri to consume the ReviewRelated service
     * @var string
     */
    public $baseUri;

    public function __construct() {
        $this->baseUri = config('services.userRelated.base_uri');
    }

    /**
     * Obtain the full list of Reviews from Site1
     * @return string
     */
    public function obtainReviews() {
        return $this->performRequest('GET', '/reviews');
    }

    /**
     * Create one review using the ReviewRelated service
     * @return string
     */
    public function createReviews($data) {
        return $this->performRequest('POST', '/reviews', $data);
    }

    /**
     * Obtain one single review from the ReviewRelatedService
     * @return string
     */
    public function obtainReview($id) {
        return $this->performRequest('GET', "/reviews/{$id}");
    }

    /**
     * Update an instance of review using the ReviewRelated service
     * @return string
     */
    public function editReview($data, $id) {
        return $this->performRequest('PUT', "/reviews/{$id}", $data);
    }

    /**
     * Remove a single review using the ReviewRelated service
     * @return string
     */
    //public function deleteReview($id) {
    //    return $this->performRequest('DELETE', "/reviews/{$id}");
    //}
}