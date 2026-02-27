<?php
require_once 'services/StudentService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $result = StudentService::deleteStudent($id);

    if (isset($result['message'])) {
        echo "<p>" . $result['message'] . "</p>";
    } else {
        echo "<p>Erreur lors de la suppression.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un étudiant</title>
</head>
<body>
    <h1>Supprimer un étudiant</h1>
    <form method="POST">
        <label>ID : <input type="number" name="id" required></label>
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>

