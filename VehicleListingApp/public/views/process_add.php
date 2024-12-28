<?php
require_once '../app/Classes/VehicleManager.php';
use App\Classes\VehicleManager;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $image = 'images/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], '../public/' . $image);

    $vehicleManager = new VehicleManager($name, $type, $price, $image);
    $vehicleManager->addVehicle([
        'name' => $name,
        'type' => $type,
        'price' => $price,
        'image' => $image
    ]);

    header('Location: ../index.php');
}
