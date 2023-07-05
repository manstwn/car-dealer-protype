<?php
namespace App\Models;
use CodeIgniter\Model;
class SalesPersonModel extends Model
{
    protected $table = 'salesperson';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'phone_number', 'email'];

    public function search($keyword)
    {
        return $this->like('name', $keyword)->findAll();
    }
}

