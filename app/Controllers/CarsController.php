<?php

namespace App\Controllers;

use App\Models\CarModel;
use CodeIgniter\Controller;

class CarsController extends Controller
{
    public function index()
    {
        $carModel = new CarModel();
        $data = [
            'title' => 'Cars List',
            'cars' => $carModel->findAll()
            
        ];

        return view('cars/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Input New Cars'
        ];
        return view('cars/create', $data);
    }

    public function store()
    {

        $filepicture = $this->request->getFile('picture');
        $filepicture->move('car_img');
        $namepicture = $filepicture->getName();

        $carModel = new CarModel();
        $carData = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'picture' => $namepicture,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        $carModel->insert($carData);

        return redirect()->to('/car');
    }

    public function edit($id)
    {
        $carModel = new CarModel();
        $data = [
            'title' => 'Edit Cars',
            'car' => $carModel->find($id)
            
        ];
        return view('cars/edit', $data);
    }

    public function update($id)
    {
        $carModel = new CarModel();
        $carData = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];


        $carModel->update($id, $carData);

        return redirect()->to('/car');
    }

    public function delete($id)
    {
        $carModel = new CarModel();
        $carModel->delete($id);

        return redirect()->to('/car');
    }

    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $carModel = new CarModel();

        $data = [
            'title' => 'Edit Sales Person',
            'cars' => $carModel->search($keyword)
        ];

        return view('cars/index', $data);
    }
}
