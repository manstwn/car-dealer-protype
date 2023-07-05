<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $transactionModel = new TransactionModel();
        $transactions = $transactionModel->findAll();

        $data['prices'] = [];
        $data['dates'] = [];
        $data['title'] = 'Dasboard';

        foreach ($transactions as $transaction) {
            $data['prices'][] = $transaction['price'];
            $data['dates'][] = $transaction['created_at'];
        }

        return view('sales/dashboard', $data);
    }
}
