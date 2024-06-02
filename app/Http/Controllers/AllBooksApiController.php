<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AllBooksApiService;
use App\Traits\ApiResponser;

class AllBooksApiController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the All Books API service
     * @var AllBooksApiService
     */
    public $allBooksApiService;

    /**
     * Create a new controller instance
     * @param AllBooksApiService $allBooksApiService
     * @return void
     */
    public function __construct(AllBooksApiService $allBooksApiService)
    {
        $this->allBooksApiService = $allBooksApiService;
    }

    /**
     * Return the book details by title
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
        ]);

        $title = $request->input('title');

        try {
            // Obtain book details from AllBooksApiService
            $data = $this->allBooksApiService->obtainBook($title);
            return $this->successResponse($data);
        } catch (\Exception $e) {
            // Handle any exceptions
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
