<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends Controller
{
    public function submit()
    {
        $session = session();

        // 🔐 Check if user is logged in
        if (! $session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to leave a review.');
        }

        $model = new ReviewModel();

        $data = [
            'movie_id' => $this->request->getPost('movie_id'),
            'name'     => $session->get('username'), // use username from session
            'rating'   => $this->request->getPost('rating'),
            'comment'  => $this->request->getPost('comment'),
        ];

        $model->insert($data);

        return redirect()->to('/review/' . $data['movie_id'])->with('success', 'Review submitted!');
    }

    public function show($movieId)
    {
        $model = new ReviewModel();
        $reviews = $model->where('movie_id', $movieId)
                         ->orderBy('created_at', 'DESC')
                         ->findAll();

        return view('reviews/show', [
            'reviews'  => $reviews,
            'movieId'  => $movieId
        ]);
    }
}
