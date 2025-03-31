<?php

namespace App\Models;

use CodeIgniter\Model;

class MoviesModel extends Model
{
    // Define the table associated with this model
    protected $table = 'movies';  // The table name for movies

    // Allowable fields for mass assignment
    protected $allowedFields = ['title', 'rating', 'box_office', 'release_date', 'description','poster'];  // Fields for movies

    // Define the primary key field for the table
    protected $primaryKey = 'id';  // The primary key for movies

    // Enable auto-increment for the primary key
    protected $useAutoIncrement = true;

    // Automatically handles timestamps (created_at and updated_at) if required
    protected $useTimestamps = false;  // Set this to true if your table has timestamps

    /**
     * Get all movies or a specific movie based on the ID
     *
     * @param false|int $id The ID of the movie. If false, all movies are fetched.
     *
     * @return array|null The movie data or null if not found.
     */
    public function getMovies($id = false)
    {
        // If no ID is provided, fetch all movies
        if ($id === false) {
            return $this->findAll();  // Fetch all movies
        }

        // If ID is provided, fetch the specific movie
        return $this->where(['id' => $id])->first();  // Fetch specific movie based on ID
    }

    /**
     * Save a movie into the database
     *
     * @param array $data The data of the movie to save.
     * @return bool True if the data is saved successfully, false otherwise.
     */
    public function saveMovie($data)
    {
        // Use the built-in save method to insert/update data
        return $this->save($data);  // Save or update the data in the movies table
    }
}
