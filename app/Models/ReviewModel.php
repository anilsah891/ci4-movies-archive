<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['movie_id', 'name', 'rating', 'comment', 'created_at'];
    protected $useTimestamps = false;
}
