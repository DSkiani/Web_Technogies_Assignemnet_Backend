<?php

namespace App\Controllers;

class WeatherApi extends BaseController
{
    public function getWeather($validatetime, $parameters, $locations) {

        // Trim whitespace from parameters
        $validatetime = trim($validatetime);
        $parameters = trim($parameters);
        $locations = trim($locations);

        // Construct the API URL based on user preferences
        $apiUrl = "https://api.meteomatics.com/$validatetime/$parameters/$locations/json";

        / Send HTTP request to the API
        $response = $this->sendRequest($apiUrl);
    
        // Check if request was successful
        if ($response['status'] === 200) {
            // Decode JSON response
            $weatherData = json_decode($response['body'], true);
    
            // Process and display weather data
            // Example: display temperature
            $temperature = $weatherData['coordinates'][0]['dates'][0]['value'];
            echo "Temperature: $temperature°C";
        } else {
            // Handle error
            echo "Error: Unable to fetch weather data.";
        }
    }

    private function sendRequest($url) {
        // Load CodeIgniter's HTTP client library
        $this->load->library('curl');

        // Send GET request
        $response = $this->curl->simple_get($url);

        // Get HTTP status code
        $statusCode = $this->curl->info['http_code'];

        return array('status' => $statusCode, 'body' => $response);
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


