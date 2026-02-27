<?php
require_once 'services/StudentService.php';

$student = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $student = StudentService::getStudentById($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chercher un étudiant</title>
</head>
<body>
    <h1>Chercher un étudiant par ID</h1>
    <form method="POST">
        <label>ID : <input type="number" name="id" required></label>
        <button type="submit">Chercher</button>
    </form>

    <?php if ($student): ?>
        <h2>Résultat</h2>
        <pre><?php print_r($student); ?></pre>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>Aucun étudiant trouvé avec cet ID.</p>
    <?php endif; ?>
</body>
</html>
