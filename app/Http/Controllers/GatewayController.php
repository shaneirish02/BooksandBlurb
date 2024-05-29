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

    public function search(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
        ]);

        $title = $request->input('title');
        $encodedTitle = preg_replace('~\s+~', '%20', $title);

        $client = new Client();

        try {
            // Construct the URL with the encoded title
            $url = config('bookfinder.base_url') . $encodedTitle;

            // Call the external API using RapidAPI
            $response = $client->get($url, [
                'headers' => [
                    'x-rapidapi-key' => config('bookfinder.api_key'),
                    'x-rapidapi-host' => parse_url(config('bookfinder.base_url'), PHP_URL_HOST),
                ]
            ]);

            // Decode the response body
            $data = json_decode($response->getBody(), true);

            // Return the response from the API
            return response()->json($data);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
