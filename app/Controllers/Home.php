<?php

namespace App\Controllers;
use App\Models\WeatherModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Home extends BaseController
{
    private $model;

    
    public function index()
    {
        $this->model = new WeatherModel();
        $weatherRecords = $this->model->findAll();
        return $this->getResponse(
            [
                'message' => 'Weather retrieved successfully',
                'weather_project' => $weatherRecords // Changed $model to $weatherRecords
            ]
        );


        return view('welcome_message');
    }

       /**
    * Get a single class by CODE
    */

}
