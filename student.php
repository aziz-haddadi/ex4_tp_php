<?php
$dsn = "mysql:host=localhost;dbname=school;charset=utf8";
$username = "root";  // Remplace par ton user MySQL
$password = "";  // Mets le mot de passe si nécessaire

try {
    $pdo = new PDO($dsn, $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM student");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Étudiants 📜</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de Naissance</th>
            <th>Action</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= $student['birthdate'] ?></td>
                <td><a href="detailEtudiant.php?id=<?= $student['id'] ?>">Détails</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
