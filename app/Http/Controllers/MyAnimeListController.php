<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyAnimeListService;
use App\Traits\ApiResponser;

class MyAnimeListController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the MyAnimeList service
     * @var MyAnimeListService
     */
    public $myAnimeListService;

    /**
     * Create a new controller instance
     * @param MyAnimeListService $myAnimeListService
     * @return void
     */
    public function __construct(MyAnimeListService $myAnimeListService)
    {
        $this->myAnimeListService = $myAnimeListService;
    }

    /**
     * Get manga recommendations from MyAnimeList API
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function getMangaRecommendations(Request $request)
    {
        $page = $request->query('page', 1);

        try {
            // Call the MyAnimeList service to get manga recommendations
            $data = $this->myAnimeListService->getMangaRecommendations($page);
            return $this->successResponse($data);
        } catch (\Exception $e) {
            // Handle any exceptions
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Get manga details from MyAnimeList API by ID
     * @param int $id
     * @return Illuminate\Http\Response
     */
    public function getMangaDetails($id)
    {
        try {
            // Call the MyAnimeList service to get manga details by ID
            $data = $this->myAnimeListService->getMangaDetailsById($id);
            return $this->successResponse($data);
        } catch (\Exception $e) {
            // Handle any exceptions
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
