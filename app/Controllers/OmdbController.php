<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class OmdbController extends Controller
{
    public function index()
    {
        $title = $this->request->getGet('title'); // Fetch movie title from GET request
        $data = [];

        if ($title) {
            $apiKey = 'da0647d4'; // Your OMDb API key
            $apiUrl = "http://www.omdbapi.com/?apikey={$apiKey}&s=" . urlencode($title);

            // Use file_get_contents to fetch the API response
            $response = file_get_contents($apiUrl);
            $result = json_decode($response, true);

            // Check if results exist
            if (!empty($result['Search'])) {
                $data['results'] = $result['Search'];
            } else {
                $data['error'] = $result['Error'] ?? 'No results found.';
            }
        }

        return view('omdb/search', $data);
    }
}
