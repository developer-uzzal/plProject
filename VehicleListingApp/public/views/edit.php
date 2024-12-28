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

$vehicle = $vehicles[$id];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicles[$id] = [
        'name'  => $_POST['name'],
        'type'  => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ];
    $vehicleManager->writeToFile($vehicles);
    header('Location: index.php');
    exit;
}
?>

<!-- Form to Edit Vehicle -->
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Vehicle Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($vehicle['name']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Vehicle Type</label>
        <input type="text" class="form-control" id="type" name="type" value="<?php echo htmlspecialchars($vehicle['type']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Vehicle Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($vehicle['price']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Vehicle Image</label>
        <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($vehicle['image']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
