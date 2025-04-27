<?php
session_start();
$errors = [
    'username' => '',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = '127.0.0.1';
    $dbname = 'connexion';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'errors' => ['db' => 'Erreur de connexion à la base de données.']]);
        exit;
    }
    $action = $_POST["action"];
    if ($action === 'change_username') {
        if (empty($_POST["username"])) {
            $errors['username'] = "Nom d'utilisateur requis.";
        }
        if (empty($errors['username'])) {
            $username = $_POST["username"];
            $stmt = $pdo->prepare("UPDATE users SET username = :username WHERE id = :id");
            $stmt->execute(['username' => $username, 'id' => $_SESSION['user_id']]);
            $_SESSION["username"] = $username;
            echo json_encode(['success' => true, 'message' => 'Nom d\'utilisateur mis à jour avec succès.']);
            header("Location: profil.php");
        } else {
            echo json_encode(['success' => false, 'errors' => $errors]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-profil">
        <h1 class="texte">Bienvenue <?php echo $_SESSION["username"]; ?></h1>
        <h2 class="texte">Remplissez le formulaire pour changer de pseudo pseudo</h2>
        <form method="POST">
            <input type="hidden" name="action" value="change_username">
            <input id="usernameRegister" name="username" class="input-register" type="text" required>
            <button type="submitbutton" class="submitboutton">Submit</button>
        </form>
    </div>
</body>

</html>