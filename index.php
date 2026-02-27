<?php
// Récupérer tous les étudiants (pour le tableau initial)
$api_url = 'http://127.0.0.1:5000/students';
$response = file_get_contents($api_url);
$students = json_decode($response, true);

// Recherche par ID (si formulaire soumis)
$student = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $api_url_single = "http://127.0.0.1:5000/students/$id";
    $response_single = file_get_contents($api_url_single);
    $student = json_decode($response_single, true);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f7fa;
        }
        .welcome-container {
            background: linear-gradient(135deg, #6a5acd, #9370db); /* Violet dégradé */
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .search-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }
        .search-container input {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .search-container button {
            padding: 8px 15px;
            background-color: #4a6baf;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-add {
            display: inline-block;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-left: 15px;
            font-weight: bold;
        }
        .btn-add:hover {
            background-color: #45a049;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4a6baf;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions a {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
            font-size: 12px;
        }
        .edit {
            background-color: #4CAF50;
        }
        .view {
            background-color: #2196F3;
        }
        .delete {
            background-color: #f44336;
        }
        .actions a:hover {
            opacity: 0.8;
            text-decoration: none;
        }
        .no-result {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- Message de bienvenue -->
    <div class="welcome-container">
        <h1>Enregistrement des étudiants de l'USPN</h1>
    </div>

    <!-- Formulaire de recherche + Bouton Ajouter -->
    <div class="search-container">
        <form method="POST" style="display: inline-block;">
            <label for="id">Rechercher par ID :</label>
            <input type="number" name="id" id="id" required>
            <button type="submit">Rechercher</button>
        </form>
        <a href="add_student.php" class="btn-add">+ Ajouter un étudiant</a>
    </div>

    <!-- Affichage des résultats -->
    <?php if ($student !== null): ?>
        <!-- Cas où un étudiant est trouvé -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Âge</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($student['id']) ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['age']) ?> ans</td>
                    <td class="actions">
                        <a href="edit_student.php?id=<?= $student['id'] ?>" class="btn edit">Edit</a>
                        <a href="view_student.php?id=<?= $student['id'] ?>" class="btn view">View</a>
                        <a href="delete_student.php?id=<?= $student['id'] ?>" class="btn delete" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])): ?>
        <!-- Cas où aucun étudiant n'est trouvé -->
        <div class="no-result">
            <p>Aucun étudiant trouvé avec l'ID <?= htmlspecialchars($_POST['id']) ?>.</p>
        </div>
    <?php else: ?>
        <!-- Cas par défaut : afficher tous les étudiants -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Âge</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $s): ?>
                    <tr>
                        <td><?= htmlspecialchars($s['id']) ?></td>
                        <td><?= htmlspecialchars($s['name']) ?></td>
                        <td><?= htmlspecialchars($s['age']) ?> ans</td>
                        <td class="actions">
                            <a href="edit_student.php?id=<?= $s['id'] ?>" class="btn edit">Edit</a>
                            <a href="view_student.php?id=<?= $s['id'] ?>" class="btn view">View</a>
                            <a href="delete_student.php?id=<?= $s['id'] ?>" class="btn delete" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>

