<?php

namespace App\Controllers;

use App\Models\CarModel;

class UserPageController extends BaseController
{
    public function index()
    {


        $carModel = new CarModel();
        // Retrieve car data from the database

        $randomPictures = $carModel
            ->select('picture')
            ->orderBy('RAND()')
            ->limit(5)
            ->findAll();

        $cars = $carModel->findAll();

        // Pass the car data to the view
        $data = [
            'cars' => $cars,
            'title' => 'Dinka Dealer',
            'randomPictures' => array_slice($randomPictures, 0, 5),
        ];
        echo view('user/home', $data);
    }

    public function vehicle()
    {

        $carModel = new CarModel();
        $data = [
            'title' => 'Vehicle List',
            'cars' => $carModel->findAll()
        ];

        echo view('user/vehicle', $data);
    }
}
