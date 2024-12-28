<?php
namespace App\Classes;

class VehicleManager extends VehicleBase implements VehicleActions
{
    use FileHandler;

    // Add a new vehicle
    public function addVehicle($data)
    {
        $vehicles = $this->getVehicles();
        $vehicles[] = $data;
        $this->writeToFile($vehicles);
    }

    // Edit an existing vehicle
    public function editVehicle($id, $data)
    {
        $vehicles = $this->getVehicles();
        $vehicles[$id] = $data;
        $this->writeToFile($vehicles);
    }

    // Delete a vehicle
    public function deleteVehicle($id)
    {
        $vehicles = $this->getVehicles();
        unset($vehicles[$id]);
        $this->writeToFile(array_values($vehicles)); // Re-index the array
    }

    // Get the list of all vehicles
    public function getVehicles()
    {
        return $this->readFromFile();
    }

    // Get the details of the current vehicle
    public function getDetails()
    {
        return [
            'name'  => $this->name,
            'type'  => $this->type,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}
