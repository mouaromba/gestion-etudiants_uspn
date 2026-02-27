<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

$api_url = "http://127.0.0.1:5000/students/$id";
$response = file_get_contents($api_url);
$student = json_decode($response, true);

if (!$student) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'étudiant</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        .student-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }
        .student-container h1 {
            text-align: center;
            color: #4a6baf;
        }
        .student-details {
            margin: 20px 0;
        }
        .student-details p {
            margin: 10px 0;
            font-size: 16px;
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .back-button a {
            padding: 10px 15px;
            background-color: #4a6baf;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="student-container">
        <h1>Détails de l'étudiant</h1>
        <div class="student-details">
            <p><strong>ID :</strong> <?= htmlspecialchars($student['id']) ?></p>
            <p><strong>Nom :</strong> <?= htmlspecialchars($student['name']) ?></p>
            <p><strong>Âge :</strong> <?= htmlspecialchars($student['age']) ?> ans</p>
        </div>
        <div class="back-button">
            <a href="index.php">Retour à la liste</a>
        </div>
    </div>
</body>
</html>
