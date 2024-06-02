<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookFinderService;
use App\Traits\ApiResponser;

class BookFinderController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Book Finder service
     * @var BookFinderService
     */
    public $bookFinderService;

    /**
     * Create a new controller instance
     * @param BookFinderService $bookFinderService
     * @return void
     */
    public function __construct(BookFinderService $bookFinderService)
    {
        $this->bookFinderService = $bookFinderService;
    }

    /**
     * Search for books using Book Finder API
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function searchBooks(Request $request)
    {
        $series = $request->query('series');
        $book_type = $request->query('book_type');
        $author = $request->query('author');

        try {
            // Call the Book Finder service to search for books
            $data = $this->bookFinderService->searchBooks($series, $book_type, $author);
            return $this->successResponse($data);
        } catch (\Exception $e) {
            // Handle any exceptions
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
