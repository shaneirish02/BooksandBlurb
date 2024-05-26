<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GatewayController extends Controller
{
    public function searchBooks(Request $request)
    {
        $series = $request->query('series');
        $book_type = $request->query('book_type');
        $author = $request->query('author');

        $apiKey = 'e5a36e79afmsh18876c308e596ccp1b1112jsn5fb4d83aa0e3';

        $client = new Client();

        try {
            $response = $client->get('https://book-finder1.p.rapidapi.com/api/search', [
                'query' => [
                    'series' => $series,
                    'book_type' => $book_type,
                    'author' => $author,
                ],
                'headers' => [
                    'x-rapidapi-host' => 'book-finder1.p.rapidapi.com',
                    'x-rapidapi-key' => $apiKey,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return $response->getBody();
            } else {
                return response()->json([
                    'message' => 'Error fetching books: ' . $response->getStatusCode(),
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occured: ' . $e->getMessage(),
            ], 500);
        }
    }
}
