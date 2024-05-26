<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\LibraryRelatedService;

class LibraryRelatedController extends Controller {

    use ApiResponser;

    /**
     * The service to consume the LibraryRelated Microservice
     * @var LibraryRelatedService
     */
    public $libraryRelatedService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(LibraryRelatedService $libraryRelatedService) {
        $this->libraryRelatedService = $libraryRelatedService;
    }

    /**
     * Return the list of libraries
     * @return Illuminate\Http\Response
     */
    public function index() {
        return $this->successResponse($this->libraryRelatedService->obtainLibraries());
    }

    public function add(Request $request) {
       return $this->successResponse($this->libraryRelatedService->createLibraries($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one library
     * @return Illuminate\Http\Response
     */
    public function show($id) {
        return $this->successResponse($this->libraryRelatedService->obtainLibrary($id));
    }

    /**
     * Update an existing library
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return $this->successResponse($this->libraryRelatedService->editLibrary($request->all(), $id));
    }

    /**
     * Remove an existing library
     * @return Illuminate\Http\Response
     */
    //public function delete($id) {
    //    return $this->successResponse($this->libraryRelatedService->deleteLibrary($id));
    //}
}