<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\UserService;

class UserController extends Controller {

    use ApiResponser;

    /**
     * The service to consume the User Microservice
     * @var UserService
     */
    public $userService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index() {
        return $this->successResponse($this->userService->obtainUsers());
    }

    public function add(Request $request) {
       return $this->successResponse($this->userService->createUsers($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one user
     * @return Illuminate\Http\Response
     */
    public function show($id) {
        return $this->successResponse($this->userService->obtainUser($id));
    }

    /**
     * Update an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return $this->successResponse($this->userService->editUser($request->all(), $id));
    }

    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function delete($id) {
        return $this->successResponse($this->userService->deleteUser($id));
    }
}