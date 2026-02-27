<?php
require_once 'services/StudentService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $result = StudentService::addStudent($name, $age);
    if (isset($result['id'])) {
        echo "<p>Étudiant ajouté avec succès ! ID : " . $result['id'] . "</p>";
    } else {
        echo "<p>Erreur lors de l'ajout.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un étudiant</title>
</head>
<body>
    <h1>Ajouter un étudiant</h1>
    <form method="POST">
        <label>Nom : <input type="text" name="name" required></label><br>
        <label>Âge : <input type="number" name="age" required></label><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
