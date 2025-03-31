<?php

namespace App\Controllers;

use App\Models\MoviesModel;

class Ajax extends BaseController
{
    public function get($slug = null)
    {
        // Check if the slug is provided
        if ($slug === null) {
            return $this->response->setStatusCode(400)->setBody('No slug provided');
        }

        // Load the model for movies
        $model = model(MoviesModel::class);

        // Fetch the movie item based on the slug
        $data = $model->getMovies($slug);

        // Check if data is returned
        if (empty($data)) {
            return $this->response->setStatusCode(404)->setBody('No movie found for the given slug');
        }

        // Set the content type to JSON
        $this->response->setHeader('Content-Type', 'application/json');

        // Encode the data to JSON format and send it
        return $this->response->setBody(json_encode($data, JSON_PRETTY_PRINT));
    }
}
