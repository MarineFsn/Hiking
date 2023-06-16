<?php
require "connection.php";

$sql = "SELECT * FROM hiking";
$stmt = $bdd->prepare($sql);
$stmt->execute();
$hikingData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Hiking List</title>
    <link rel="stylesheet" href="output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<header class="bg-gray-200 py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-2xl font-bold text-gray-800">[HIKE]Réunion</h1>
        <div class="flex items-center space-x-4">
            <a href="index.php"
                class="text-2xl font-bold text-gray-800 border border-gray-800 rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-800 hover:text-white">Home</a>
            <a href="create.php"
                class="text-2xl font-bold text-gray-800 border border-gray-800 rounded-md px-4 py-2 transition-colors duration-300 hover:bg-gray-800 hover:text-white">Add
                a new hiking</a>
        </div>
    </div>
</header>


<body class="bg-gray-100">
    <div class="flex justify-evenly flex-wrap">
        <?php foreach ($hikingData as $hiking) { ?>
            <div class="max-w-sm rounded overflow-hidden shadow-md m-4 bg-blue-200">
                <div class="px-6 py-4">
                    <h2 class="font-bold text-xl mb-2">
                        <?php echo $hiking['name']; ?>
                    </h2>
                    <p class="text-gray-700">Difficulty:
                        <?php echo $hiking['difficulty']; ?>
                    </p>
                    <p class="text-gray-700">Distance:
                        <?php echo $hiking['distance']; ?> Km
                    </p>
                    <p class="text-gray-700">Duration:
                        <?php echo $hiking['duration']; ?>
                    </p>
                    <p class="text-gray-700">Height difference:
                        <?php echo $hiking['height_difference']; ?> M
                    </p>
                </div>
                <div class="px-6 py-4">
                    <a href="update.php?id=<?php echo $hiking['id']; ?>"
                        class="text-blue-500 hover:text-blue-700 bg-blue-100 hover:bg-blue-200 rounded py-1 px-2 mr-2">Update</a>
                    <a href="delete.php?id=<?php echo $hiking['id']; ?>"
                        class="text-red-500 hover:text-red-700 bg-red-100 hover:bg-red-200 rounded py-1 px-2">Delete</a>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance = $_POST['distance'];
        $duration = $_POST['duration'];
        $height_difference = $_POST['height_difference'];

        $hiking = [
            'name' => $name,
            'difficulty' => $difficulty,
            'distance' => $distance,
            'duration' => $duration,
            'height_difference' => $height_difference
        ];

        $sql = "INSERT INTO hiking(name, difficulty, distance, duration, height_difference) 
                VALUES (:name, :difficulty, :distance, :duration, :height_difference)";

        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':difficulty', $difficulty);
        $stmt->bindParam(':distance', $distance);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':height_difference', $height_difference);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed.";
        }
    }
    ?>
</body>

<footer>
    <?php include "./partials/footer.php" ?>
</footer>

</html>