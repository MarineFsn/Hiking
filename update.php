<?php
require "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    $sql = "UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE id = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':difficulty', $difficulty);
    $stmt->bindParam(':distance', $distance);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':height_difference', $height_difference);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to update hiking.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM hiking WHERE id = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $hiking = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Hiking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<header class="bg-gray-200 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-2xl font-bold text-gray-800">[HIKE]Réunion</h1>
        <div class="flex items-center space-x-4">
            <a href="index.php"
                class="text-2xl font-bold text-gray-800 border border-gray-800 rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-800 hover:text-white">Home</a>

        </div>
    </div>
</header>

<body>
    <fieldset class="p-6 bg-white shadow-md rounded">
        <form action="update.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $hiking['id']; ?>">

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $hiking['name']; ?>" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="difficulty" class="block text-gray-700">Difficulty:</label>
                <input type="text" name="difficulty" id="difficulty" value="<?php echo $hiking['difficulty']; ?>"
                    required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="distance" class="block text-gray-700">Distance:</label>
                <input type="text" name="distance" id="distance" value="<?php echo $hiking['distance']; ?>" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-gray-700">Duration:</label>
                <input type="text" name="duration" id="duration" value="<?php echo $hiking['duration']; ?>" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="height_difference" class="block text-gray-700">Height difference:</label>
                <input type="text" name="height_difference" id="height_difference"
                    value="<?php echo $hiking['height_difference']; ?>" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <input type="submit" value="Update Hiking"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 cursor-pointer">
        </form>
    </fieldset>

</body>
<?php include "./partials/footer.php" ?>

</html>