
<?php
require_once 'services/StudentService.php';

$students = StudentService::getAllStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Liste des étudiants</h1>
    <pre><?php print_r($students); ?></pre>
</body>
</html>
