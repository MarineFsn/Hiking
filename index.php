<?php
require "connection.php";

$hikingData = [
    [
        'name' => 'Aurère par le Sentier Scout depuis le Bélier',
        'difficulty' => 'difficile',
        'distance' => 17.8,
        'duration' => 63000,
        'height_difference' => 1200
    ],
    [
        'name' => 'Du Col des Bœufs à la Nouvelle et retour',
        'difficulty' => 'moyen',
        'distance' => 15.1,
        'duration' => 50000,
        'height_difference' => 820
    ],
    [
        'name' => 'La Roche Ecrite depuis Mamode Camp',
        'difficulty' => 'moyen',
        'distance' => 18.6,
        'duration' => 63000,
        'height_difference' => 1100
    ],
    [
        'name' => 'Une boucle vers Grand Bassin par Bois Court et le Sentier Mollaret',
        'difficulty' => 'difficile',
        'distance' => 13.9,
        'duration' => 60000,
        'height_difference' => 1050
    ],
    [
        'name' => 'Le Cap Noir et Roche Verre Bouteille',
        'difficulty' => 'facile',
        'distance' => 3,
        'duration' => 20000,
        'height_difference' => 320
    ]
];

require "create.php";

echo "<table>";
echo "<tr><th>Nom</th><th>Difficulté</th><th>Distance</th><th>Durée</th><th>Dénivelé</th></tr>";


foreach ($hikingData as $hiking) {
    echo "<tr>";
    echo "<td>" . $hiking['name'] . " </td>";
    echo "<td>" . $hiking['difficulty'] . "</td>";
    echo "<td>" . $hiking['distance'] . " Km</td>";
    echo "<td>" . $hiking['duration'] . " </td>";
    echo "<td>" . $hiking['height_difference'] . " M </td>";
    echo "</tr>";


    $sql = "INSERT INTO hiking(name, difficulty, distance, duration, height_difference) 
        VALUES (:name, :difficulty, :distance, :duration, :height_difference)";

    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':name', $hiking['name']);
    $stmt->bindParam(':difficulty', $hiking['difficulty']);
    $stmt->bindParam(':distance', $hiking['distance']);
    $stmt->bindParam(':duration', $hiking['duration']);
    $stmt->bindParam(':height_difference', $hiking['height_difference']);
    $stmt->execute();


}
echo "</table>"
    ?>