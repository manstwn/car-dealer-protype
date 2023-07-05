<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'phone_number', 'email', 'address'];
    public function search($keyword)
    {
        return $this->like('name', $keyword)->findAll();
    }
}
