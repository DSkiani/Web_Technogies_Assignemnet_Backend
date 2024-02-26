<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WeatherModel as ClassModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WeatherApi extends BaseController
{
        /*
    * Get all Classes
    * @return Response
    */
   public function index()
   {
        $model = new ClassModel();
        return $this->getResponse(
            [
                'message' => 'Classes retrieved successfully',
                'weather_project' => $model->findAll()
            ]
        );
   }

   /**
    * Get a single class by CODE
    */
   public function show($City)
   {
       try {
           $model = new ClassModel();
           $weather = $model->findWeatherByCity($City)->findAll();
           return $this->getResponse(
               [
                   'message' => 'Weather retrieved successfully',
                   'weather_project' => $weather
               ]
           );
       } catch (Exception $e) {
           return $this->getResponse(
               [
                   'message' => 'Could not find weather for specified city',
                   'error' => $e->getMessage()
               ],
               ResponseInterface::HTTP_NOT_FOUND
           );
       }
   }
   
}