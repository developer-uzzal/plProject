<?php
require_once '../app/Classes/FileHandler.php';
require_once '../app/Classes/VehicleBase.php';
require_once '../app/Classes/VehicleActions.php';
require_once '../app/Classes/VehicleManager.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    die('Vehicle ID not provided!');
}

$vehicleManager = new \App\Classes\VehicleManager("", "", 0, "");
$vehicles = $vehicleManager->getVehicles();

if (!isset($vehicles[$id])) {
    die('Vehicle not found!');
}

unset($vehicles[$id]);  // Remove the vehicle from the array
$vehicleManager->writeToFile(array_values($vehicles)); // Re-index the array

header('Location: index.php');  // Redirect to index.php after deletion
exit;
