<?php

namespace App\Controllers;

class WeatherApi extends BaseController
{
    public function getWeather($location) {
    // Logic to retrieve weather data for the specified location
    $weatherData = array(/* Data retrieved from a weather API or mock data */);

    // Encode data into JSON format
    $jsonData = json_encode($weatherData);

    // Set Content-Type header to indicate JSON format
    $this->output->set_content_type('application/json');

    // Return JSON data
    $this->output->set_output($jsonData);
    }

    public function saveUserPreference() {
        // Logic to save user preferences to the database
        // Access POST data using $this->input->post() or $_POST superglobal

        // Dummy response for demonstration
        $response = array('message' => 'User preferences saved successfully');

        // Encode response data into JSON format
        $jsonData = json_encode($response);

        // Set Content-Type header to indicate JSON format
        $this->output->set_content_type('application/json');

        // Return JSON response
        $this->output->set_output($jsonData);
    }
}


