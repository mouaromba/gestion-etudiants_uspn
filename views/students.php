<?php
require_once __DIR__ . '/../services/StudentService.php';

$studentService = new StudentService();
$students = $studentService->getAllStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des étudiants</title>
</head>
<body>
    <h1>Gestion des étudiants</h1>

    <h2>Liste des étudiants</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Âge</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $student['age'] ?></td>
            <td>
                <a href="test_api3.php?id=<?= $student['id'] ?>">Voir</a> |
                <a href="test_api4.php?id=<?= $student['id'] ?>">Modifier</a> |
                <a href="test_api5.php?id=<?= $student['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ajouter un étudiant</h2>
    <a href="test_api2.php">Ajouter un étudiant</a>
</body>
</html>
