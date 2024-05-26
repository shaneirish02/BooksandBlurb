<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\BookRelatedService;

class BookRelatedController extends Controller {

    use ApiResponser;

    /**
     * The service to consume the BookRelated Microservice
     * @var BookRelatedService
     */
    public $bookRelatedService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(BookRelatedService $bookRelatedService) {
        $this->bookRelatedService = $bookRelatedService;
    }

    /**
     * Return the list of book details
     * @return Illuminate\Http\Response
     */
    public function index() {
        return $this->successResponse($this->bookRelatedService->obtainBooksRelated());
    }

    public function add(Request $request) {
        return $this->successResponse($this->bookRelatedService->createBooks($request->all(), Response::HTTP_CREATED));   
    }

    /**
     * Obtains and show one book detail
     * @return Illuminate\Http\Response
     */
    public function show($id) {
        return $this->successResponse($this->bookRelatedService->obtainBook($id));
    }

    /**
     * Update an existing book detail
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return $this->successResponse($this->bookRelatedService->editBook($request->all(), $id));   
    }

    /**
     * Remove an existing book detail
     * @return Illuminate\Http\Response
     */
    //public function delete($id) {
    //    return $this->successResponse($this->bookRelatedService->deleteBook($id));
    //}
}