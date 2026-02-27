<?php
require_once 'services/StudentService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $result = StudentService::addStudent($name, $age);
    if (isset($result['id'])) {
        header('Location: index.php');
        exit();
    } else {
        $error = "Erreur lors de l'ajout de l'étudiant";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un étudiant</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" class="student-form">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="age">Âge :</label>
                <input type="number" id="age" name="age" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-create">Ajouter</button>
                <a href="index.php" class="btn btn-cancel">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
