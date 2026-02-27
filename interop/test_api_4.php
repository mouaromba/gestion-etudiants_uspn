<?php
require_once 'services/StudentService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $student = StudentService::updateStudent($id, $name, $age);
    if ($student) {
        echo "<p>Étudiant mis à jour avec succès !</p>";
    } else {
        echo "<p>Erreur lors de la mise à jour.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mettre à jour un étudiant</title>
</head>
<body>
    <h1>Mettre à jour un étudiant</h1>
    <form method="POST">
        <label>ID : <input type="number" name="id" required></label><br>
        <label>Nom : <input type="text" name="name" required></label><br>
        <label>Âge : <input type="number" name="age" required></label><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
