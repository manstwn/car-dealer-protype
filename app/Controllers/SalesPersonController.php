<?php

namespace App\Controllers;

use App\Models\SalesPersonModel;
use CodeIgniter\Controller;

class SalesPersonController extends Controller
{

    protected $salesPersonModel;

    public function __construct()
    {
        $this->salesPersonModel = new SalesPersonModel();
    }
    public function index()
    {
        $model = new SalesPersonModel();
        $data = [
            'title' => 'Sales Person List',
            'agents' => $model->findAll()
            
        ];

        return view('sales-person/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Sales Person',
            
        ];
        return view('sales-person/create', $data);
    }

    public function store()
    {
        $model = new SalesPersonModel();

        $agentData = [
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email')
        ];

        $model->insert($agentData);

        return redirect()->to('/sales-person');
    }

    public function edit($id)
    {
        $model = new SalesPersonModel();
        $data = [
            'title' => 'Edit Sales Person',
            'salesperson' => $model->find($id)
            
        ];

        return view('sales-person/edit', $data);
    }

    public function update($id)
    {
        $model = new SalesPersonModel();

        $agentData = [
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email')
        ];

        $model->update($id, $agentData);

        return redirect()->to('/sales-person');
    }

    public function delete($id)
    {
        $model = new SalesPersonModel();
        $model->delete($id);

        return redirect()->to('/sales-person');
    }

    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $salesPersonModel = new SalesPersonModel();

        $data = [
            'title' => 'Edit Sales Person',
            'agents' => $salesPersonModel->search($keyword)
        ];

        return view('sales-person/index', $data);
    }
    
}
