<!DOCTYPE html>
<html>

<head>
    <title>Ajouter une randonnée</title>
</head>

<body>

    <?php
    require "connection.php";

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

        array_push($hikingData, $hiking);

        $sql = "INSERT INTO hiking(name, difficulty, distance, duration, height_difference) 
                VALUES (:name, :difficulty, :distance, :duration, :height_difference)";

        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':difficulty', $difficulty);
        $stmt->bindParam(':distance', $distance);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':height_difference', $height_difference);
        $stmt->execute();

        echo "<script>alert('La randonnée a été ajoutée avec succès.');</script>";
    }
    ?>

    <fieldset>
        <legend>Indiquez vos données ici</legend>

        <form action="index.php" method="POST">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required><br>

            <label for="difficulty">Difficulté :</label>
            <input type="text" name="difficulty" id="difficulty" required><br>

            <label for="distance">Distance :</label>
            <input type="text" name="distance" id="distance" required><br>

            <label for="duration">Durée :</label>
            <input type="text" name="duration" id="duration" required><br>

            <label for="height_difference">Dénivelé :</label>
            <input type="text" name="height_difference" id="height_difference" required><br>

            <input type="submit" value="Ajouter la randonnée">
        </form>

    </fieldset>

</body>

</html>