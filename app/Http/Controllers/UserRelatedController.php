<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\UserRelatedService;

class UserRelatedController extends Controller {

    use ApiResponser;

    /**
     * The service to consume the UserRelated Microservice
     * @var UserRelatedService
     */
    public $userRelatedService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(UserRelatedService $userRelatedService) {
        $this->userRelatedService = $userRelatedService;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index() {
        return $this->successResponse($this->userRelatedService->obtainUsers());
    }

    public function add(Request $request) {
       return $this->successResponse($this->userRelatedService->createUsers($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one user
     * @return Illuminate\Http\Response
     */
    public function show($id) {
        return $this->successResponse($this->userRelatedService->obtainUser($id));
    }

    /**
     * Update an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return $this->successResponse($this->userRelatedService->editUser($request->all(), $id));
    }

    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    //public function delete($id) {
    //    return $this->successResponse($this->userRelatedService->deleteUser($id));
    //}
}