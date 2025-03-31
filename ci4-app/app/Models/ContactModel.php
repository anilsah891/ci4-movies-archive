<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact_messages';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'subject', 'message'];
    
    // ✅ Enable created_at but skip updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // ✅ This disables the broken part
}
