<?php
require "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM hiking WHERE id = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to delete hiking.";
    }
}
?>