<?php

require_once("connexion.php"); 

if ($_POST) {

    $titre = $_POST["titre"];
    $auteur = $_POST["auteur"];
    $date_de_sortie = $_POST["date_de_sortie"];
    $disponible = isset($_POST["disponible"]) ? 1 : 0;

    try {
        $stmt = $pdo->prepare("INSERT INTO disponible (titre, auteur, date_de_sortie, disponible) 
        VALUES( :titre, :auteur, :date_de_sortie, :disponible )");

        $stmt->execute([
            "titre" => $titre,
            "auteur" => $auteur,
            "date_de_sortie" => $date_de_sortie,
            "disponible" => $disponible,
        ]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {

    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM disponible WHERE id = :id");

        $stmt->execute([
            "id" => $id,
        ]);

        echo "Le livre a bien été supprimé !";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

$stmt = $pdo->query("SELECT * FROM disponible");
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Catalogue de Livres</title>
</head>

<body>

    <h1>Mes livres en BDD</h1>

    <table border="1">
        <thead>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de sortie</th>
            <th>Disponible</th>
            <th>Action</th>
        </thead>

        <tbody>

            <?php

            foreach ($books as $book) {
                echo "<tr>";
                echo "<td>" . $book["titre"] . "</td>";
                echo "<td>" . $book["auteur"] . "</td>";
                echo "<td>" . $book["date_de_sortie"] . "</td>";
                echo "<td>" . ($book["disponible"] ? "Oui" : "Non") . "</td>";
                echo "<td> <a href='?id=" . $book["id"] . "&action=delete'> Supprimer </a> </td>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>

    <br>
    <br>
    <form method="POST">

        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" placeholder="Titre" required>

        <label for="auteur">Auteur:</label>
        <input type="text" name="auteur" id="auteur" placeholder="Auteur" required>

        <label for="date_de_sortie">Date de sortie:</label>
        <input type="date" name="date_de_sortie" id="date_de_sortie" required>

        <label for="disponible">Disponible:</label>
        <input type="checkbox" name="disponible" id="disponible">

        <input type="submit" value="Créer livre">

    </form>

</body>

</html>