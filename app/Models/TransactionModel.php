<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'car_id', 'salesperson_id', 'price'];
    protected $useTimestamps = true; // Enable automatic timestamps

    protected $createdField = 'created_at'; // Specify the created_at field name
    protected $updatedField = 'updated_at'; // Specify the updated_at field name

    public function search($keyword)
    {
        return $this->like('customer_id', $keyword)->findAll();
    }
}
