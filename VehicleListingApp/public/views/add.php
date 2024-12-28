<?php
require_once '../app/Classes/FileHandler.php';
require_once '../app/Classes/VehicleBase.php';
require_once '../app/Classes/VehicleActions.php';
require_once '../app/Classes/VehicleManager.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleData = [
        'name'  => $_POST['name'],
        'type'  => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ];

    $vehicleManager = new \App\Classes\VehicleManager("", "", 0, "");
    $vehicleManager->addVehicle($vehicleData);

    header('Location: ../index.php');  // Redirect to index.php after adding
    exit;
}
?>

<!-- Form to Add Vehicle -->
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Vehicle Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Vehicle Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Vehicle Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Vehicle Image</label>
        <input type="text" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Vehicle</button>
</form>
