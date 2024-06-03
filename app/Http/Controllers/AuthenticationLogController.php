<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\AuthenticationLogService;

class AuthenticationLogController extends Controller {

    use ApiResponser;

    /**
     * The service to consume the Authentication Log Microservice
     * @var AuthenticationLogService
     */
    public $authenticationLogService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(AuthenticationLogService $authenticationLogService) {
        $this->authenticationLogService = $authenticationLogService;
    }

    /**
     * Return the list of logs
     * @return Illuminate\Http\Response
     */
    public function index() {
        return $this->successResponse($this->authenticationLogService->obtainLogs());
    }

    /**
     * Obtains and show one log
     * @return Illuminate\Http\Response
     */
    public function show($id) {
        return $this->successResponse($this->authenticationLogService->obtainLog($id));
    }

    /**
     * Remove an existing log
     * @return Illuminate\Http\Response
     */
    public function delete($id) {
        return $this->successResponse($this->authenticationLogService->deleteLog($id));
    }
}