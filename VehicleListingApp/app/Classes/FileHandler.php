<?php
namespace App\Classes;

trait FileHandler
{
    // Method to read data from the vehicles.json file
    public function readFromFile()
    {
        $filePath = '../data/vehicles.json';
        if (file_exists($filePath)) {
            $data = file_get_contents($filePath);
            return json_decode($data, true);
        }
        return [];
    }

    // Method to write data to the vehicles.json file
    public function writeToFile($data)
    {
        $filePath = '../data/vehicles.json';
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
