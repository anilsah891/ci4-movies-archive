<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MoviesModel;

class MoviesController extends Controller
{
    public function index()
    {
        $model = new MoviesModel();
        $data['movies'] = $model->getMovies();
        $data['title'] = 'Movies Archive';

        // ✅ OMDb API Integration (only if search title is passed)
        $searchTitle = $this->request->getGet('title');
        if ($searchTitle) {
            $apiKey = 'da0647d4'; // Your API key
            $apiUrl = "http://www.omdbapi.com/?apikey={$apiKey}&s=" . urlencode($searchTitle);

            $response = file_get_contents($apiUrl);
            $result = json_decode($response, true);

            if (!empty($result['Search'])) {
                $data['omdbResults'] = $result['Search'];
            } else {
                $data['omdbError'] = $result['Error'] ?? 'No results found.';
            }
        }


              // Return the view for a specific news item
              return view('templates/header', $data)
                  . view('movies/index')
                  . view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Create New Movie';
        return view('movies/create', $data);
    }

    public function store()
    {
        $model = new MoviesModel();

        $validationRules = [
            'title' => 'required|min_length[3]',
            'rating' => 'required|decimal',
            'box_office' => 'required|decimal',
            'release_date' => 'required|valid_date',
            'description' => 'required|min_length[3]',
            'poster' => [
                'uploaded[poster]',
                'is_image[poster]',
                'mime_in[poster,image/jpg,image/jpeg,image/png,image/webp]',
                'max_size[poster,2048]'
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/movies/new')
                ->withInput()
                ->with('error', 'Validation failed. Poster might be missing or invalid.')
                ->with('validation', $this->validator);
        }

        $posterFile = $this->request->getFile('poster');

        // 🛠 DEBUGGING BLOCK
        if (!$posterFile->isValid()) {
            die('❌ Poster upload failed: ' . $posterFile->getErrorString() . ' (' . $posterFile->getError() . ')');
        }

        $posterName = $posterFile->getRandomName();
        $posterFile->move(ROOTPATH . 'public/posters', $posterName);

        $data = [
            'title' => $this->request->getVar('title'),
            'rating' => $this->request->getVar('rating'),
            'box_office' => $this->request->getVar('box_office'),
            'release_date' => $this->request->getVar('release_date'),
            'description' => $this->request->getVar('description'),
            'poster' => $posterName
        ];

        $model->save($data);

        return redirect()->to('/movies')->with('success', 'Movie added with poster!');
    }

    public function view($id = null)
    {
        $model = new MoviesModel();
        $data['movie'] = $model->getMovies($id);

        if (empty($data['movie'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the movie item: ' . $id);
        }

        $data['title'] = $data['movie']['title'];
        return view('movies/view', $data);
    }
}
