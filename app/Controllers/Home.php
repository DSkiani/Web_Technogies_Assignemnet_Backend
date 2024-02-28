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
    public function findByCity(string $City)
    {
        try {
            // Instantiate the WeatherModel
            $this->model = new WeatherModel();
    
            // Call the findWeatherByCity method from the model
            $weatherRecord = $this->model->findWeatherByCity($City);
    
            // Return the weather record
            return $weatherRecord;
        } catch (Exception $e) {
            // Handle any exceptions (e.g., weather not found for specified city)
            return $this->getResponse([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function __construct()
            {
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
            }

}
