<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class UserService {

    use ConsumesExternalService;

    /**
     * The base uri to consume the UserRelated service
     * @var string
     */
    public $baseUri;

    public function __construct() {
        $this->baseUri = config('services.site1.base_uri');
    }

    /**
     * Obtain the full list of Users from Site1
     * @return string
     */
    public function obtainUsers() {
        return $this->performRequest('GET', '/users');
    }

    /**
     * Create one user using the UserRelated service
     * @return string
     */
    public function createUsers($data) {
        return $this->performRequest('POST', '/users', $data);
    }

    /**
     * Obtain one single user from the UserRelatedService
     * @return string
     */
    public function obtainUser($id) {
        return $this->performRequest('GET', "/users/{$id}");
    }

    /**
     * Update an instance of user using the UserRelated service
     * @return string
     */
    public function editUser($data, $id) {
        return $this->performRequest('PUT', "/users/{$id}", $data);
    }

    /**
     * Remove a single user using the UserRelated service
     * @return string
     */
    public function deleteUser($id) {
        return $this->performRequest('DELETE', "/users/{$id}");
    }
}