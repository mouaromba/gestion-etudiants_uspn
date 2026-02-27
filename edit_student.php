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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $data = [
        'name' => $name,
        'age' => $age
    ];
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'PUT',
            'content' => json_encode($data)
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents("http://127.0.0.1:5000/students/$id", false, $context);

    if ($result !== false) {
        header('Location: index.php');
        exit();
    } else {
        $error = "Erreur lors de la mise à jour de l'étudiant";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }
        .form-container h1 {
            text-align: center;
            color: #4a6baf;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .form-actions button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .cancel-btn {
            background-color: #f44336;
            color: white;
            text-decoration: none;
        }
        .error {
            color: #f44336;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Modifier un étudiant</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Âge :</label>
                <input type="number" id="age" name="age" value="<?= htmlspecialchars($student['age']) ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn">Modifier</button>
                <a href="index.php" class="cancel-btn">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
