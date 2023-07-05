<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'price', 'picture', 'description'];

    public function search($keyword)
    {
        return $this->like('name', $keyword)->findAll();
    }
}
