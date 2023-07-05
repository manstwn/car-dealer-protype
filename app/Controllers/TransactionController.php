<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CarModel;
use App\Models\SalesPersonModel;
use App\Models\TransactionModel;

class TransactionController extends BaseController
{
    protected $customerModel;
    protected $carModel;
    protected $salesPersonModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->carModel = new CarModel();
        $this->salesPersonModel = new SalesPersonModel();
    }

    // Display a list of transactions
    public function index()
    {
        // Assuming you have a TransactionModel.php model, retrieve all transactions
        $transactionModel = new TransactionModel();


        $data = [
            'title' => 'Transaction',
            'transactions' => $transactionModel->findAll()
            
        ];

        return view('transaction/index', $data);
    }

    // Display the create transaction form
    public function create()
    {
        $data['title'] = 'Create Transaction';
        $data['customers'] = $this->customerModel->findAll();
        $data['cars'] = $this->carModel->findAll();
        $data['salespersons'] = $this->salesPersonModel->findAll();
    

        return view('transaction/create', $data);
    }

    // Store the newly created transaction
    public function store()
    {
        // Get the input data
        $customerId = $this->request->getPost('customer_id');
        $carId = $this->request->getPost('car_id');
        $salespersonId = $this->request->getPost('salesperson_id');
        $price = $this->request->getPost('price');
    
        // Store the transaction in the database (you need to create the transaction model)
        $transactionData = [
            'customer_id' => $customerId,
            'car_id' => $carId,
            'salesperson_id' => $salespersonId,
            'price' => $price
        ];
    
        // Assuming you have a TransactionModel.php model, create a new instance and save the data
        $transactionModel = new TransactionModel();
        $transactionModel->insert($transactionData);
    
        // Redirect to the transaction list page or show a success message
        return redirect()->to('/transaction')->with('success', 'Transaction created successfully.');
    }

    // Display the edit transaction form
    public function edit($id)
    {
        $transactionModel = new TransactionModel();
        $data['title'] = 'Edit Data';
        $data['transaction'] = $transactionModel->find($id);
        $data['customers'] = $this->customerModel->findAll();
        $data['cars'] = $this->carModel->findAll();
        $data['salespersons'] = $this->salesPersonModel->findAll();

        return view('transaction/edit', $data);
    }

    // Update the existing transaction
    public function update($id)
    {
        // Get the input data
        $customerId = $this->request->getPost('customer_id');
        $carId = $this->request->getPost('car_id');
        $salespersonId = $this->request->getPost('salesperson_id');
        $price = $this->request->getPost('price');

        // Update the transaction in the database
        $transactionData = [
            'customer_id' => $customerId,
            'car_id' => $carId,
            'salesperson_id' => $salespersonId,
            'price' => $price
        ];

        // Assuming you have a TransactionModel.php model, update the transaction data
        $transactionModel = new TransactionModel();
        $transactionModel->update($id, $transactionData);

        // Redirect to the transaction list page or show a success message
        return redirect()->to('/transaction')->with('success', 'Transaction updated successfully.');
    }

    // Delete a transaction
    public function delete($id)
    {
        // Assuming you have a TransactionModel.php model, delete the transaction
        $transactionModel = new TransactionModel();
        $transactionModel->delete($id);

        // Redirect to the transaction list page or show a success message
        return redirect()->to('/transaction')->with('success', 'Transaction deleted successfully.');
    }

    public function index2()
    {
        $transactionModel = new TransactionModel();

        // Get total sales
        $totalSales = $transactionModel->selectSum('price')->get()->getRowArray()['price'];

        // Calculate profit (10% of total sales)
        $profit = $totalSales * 0.1;

        // Get transactions for the selected month
        $selectedMonth = $this->request->getGet('month');
        $transactions = $transactionModel->where('MONTH(created_at)', $selectedMonth)->findAll();

        // Pass the data to the view
        $data = [
            'totalSales' => $totalSales,
            'profit' => $profit,
            'transactions' => $transactions,
            'title' => 'asd'
        ];

        return view('sales/dashboard', $data);
    }
    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $transactionModel = new TransactionModel();

        $data = [
            'title' => 'Edit Sales Person',
            'transactions' => $transactionModel->search($keyword)
        ];

        return view('transaction/index', $data);
    }
}







