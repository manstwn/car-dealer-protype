<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data = [
            'title' => 'Customer List',
            'customers' => $customerModel->findAll()
            
        ];

        return view('customer/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Customer'
        ];
        return view('customer/create', $data);
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        $data = [
            
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address')
        ];

        $customerModel->insert($data);

        return redirect()->to('/customer');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $data['customer'] = $customerModel->find($id);

        $data = [
            'title' => 'Edit Customer',
            'customer' => $customerModel->find($id)
            
        ];

        return view('customer/edit', $data);
    }

    public function update($id)
    {
        $customerModel = new CustomerModel();

        $data = [
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address')
        ];

        $customerModel->update($id, $data);

        return redirect()->to('/customer');
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id);

        return redirect()->to('/customer');
        
    }

    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $customerModel = new CustomerModel();

        $data = [
            'title' => 'Edit Customer',
            'customers' => $customerModel->search($keyword)
        ];

        return view('customer/index', $data);
    }

}
