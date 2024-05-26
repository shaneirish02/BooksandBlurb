<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\ReviewRelatedService;

class ReviewRelatedController extends Controller {

    use ApiResponser;

    /**
     * The service to consume the ReviewRelated Microservice
     * @var ReviewRelatedService
     */
    public $reviewRelatedService;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(ReviewRelatedService $reviewRelatedService) {
        $this->reviewRelatedService = $reviewRelatedService;
    }

    /**
     * Return the list of reviews
     * @return Illuminate\Http\Response
     */
    public function index() {
        return $this->successResponse($this->reviewRelatedService->obtainReviews());
    }

    public function add(Request $request) {
       return $this->successResponse($this->reviewRelatedService->createReviews($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one review
     * @return Illuminate\Http\Response
     */
    public function show($id) {
        return $this->successResponse($this->reviewRelatedService->obtainReview($id));
    }

    /**
     * Update an existing review
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return $this->successResponse($this->reviewRelatedService->editReview($request->all(), $id));
    }

    /**
     * Remove an existing review
     * @return Illuminate\Http\Response
     */
    //public function delete($id) {
    //    return $this->successResponse($this->reviewRelatedService->deleteReview($id));
    //}
}