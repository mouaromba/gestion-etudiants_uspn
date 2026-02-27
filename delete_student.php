<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $api_url = "http://127.0.0.1:5000/students/$id";
    $options = [
        'http' => [
            'method' => 'DELETE'
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($api_url, false, $context);

    if ($result !== false) {
        header('Location: index.php');
        exit();
    } else {
        $error = "Erreur lors de la suppression de l'étudiant";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un étudiant</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        .confirm-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
        .confirm-container h1 {
            color: #f44336;
        }
        .confirm-actions {
            margin-top: 20px;
        }
        .confirm-actions button, .confirm-actions a {
            padding: 10px 15px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
        }
        .cancel-btn {
            background-color: #4a6baf;
            color: white;
        }
    </style>
</head>
<body>
    <div class="confirm-container">
        <h1>Supprimer un étudiant</h1>
        <p>Êtes-vous sûr de vouloir supprimer cet étudiant ?</p>
        <div class="confirm-actions">
            <form method="POST">
                <button type="submit" class="delete-btn">Supprimer</button>
            </form>
            <a href="index.php" class="cancel-btn">Annuler</a>
        </div>
    </div>
</body>
</html>
