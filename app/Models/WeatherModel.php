<?php
namespace App\Models;
use CodeIgniter\Model;
use Exception;
class WeatherModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'weather_project';
    protected $primaryKey           = 'City';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['Country', 'Temperature', 'Humidity', 'Wing dust', 'Precipitation', 'Latitude', 'Longitude'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    
    public function findWeatherByCity(string $City)
    {
        $weather = $this
            ->asArray()
            ->where(['City' => $City])
            ->first();
        if (!$weather) 
            throw new Exception('Weather does not exist for specified city');
        return $weather;
    }
}