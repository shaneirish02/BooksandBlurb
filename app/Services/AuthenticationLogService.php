<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthenticationLogService {

    use ConsumesExternalService;

    /**
     * The base uri to consume the Authentication Log service
     * @var string
     */
    public $baseUri;

    public function __construct() {
        $this->baseUri = config('services.site2.base_uri');
    }

    /**
     * Obtain the full list of Authentication Logs from Site 2
     * @return string
     */
    public function obtainLogs() {
        return $this->performRequest('GET', '/logs');
    }

    /**
     * Create one log using the Log service
     * @return string
     */
    public function createLogs($data) {
        return $this->performRequest('POST', '/logs', $data);
    }

    /**
     * Obtain one single log from the Authentication Log service
     * @return string
     */
    public function obtainLog($id) {
        return $this->performRequest('GET', "/logs/{$id}");
    }

    /**
     * Remove a single log using the Authentication Log service
     * @return string
     */
    public function deleteLog($id) {
        return $this->performRequest('DELETE', "/logs/{$id}");
    }
}