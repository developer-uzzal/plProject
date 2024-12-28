<?php
require_once '../app/Classes/FileHandler.php';
require_once '../app/Classes/VehicleBase.php';
require_once '../app/Classes/VehicleActions.php';
require_once '../app/Classes/VehicleManager.php';

$vehicleManager = new \App\Classes\VehicleManager("", "", 0, "");
$vehicles = $vehicleManager->getVehicles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Vehicle Listing</h1>
    <a href="views/add.php" class="btn btn-success mb-3">Add New Vehicle</a>
    <div class="row">
        <?php foreach ($vehicles as $index => $vehicle): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/<?php echo $vehicle['image']; ?>" class="card-img-top" alt="Vehicle Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($vehicle['name']); ?></h5>
                        <p class="card-text">
                            <strong>Type:</strong> <?php echo htmlspecialchars($vehicle['type']); ?><br>
                            <strong>Price:</strong> $<?php echo number_format($vehicle['price']); ?>
                        </p>
                        <a href="views/edit.php?id=<?php echo $index; ?>" class="btn btn-warning">Edit</a>
                        <a href="views/delete.php?id=<?php echo $index; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div
