<?php

$dsn = 'mysql:host=localhost;dbname=bd_livres';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $connex = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "<script type='text/javascript'>alert('Connexion impossible à la base')</script>";
}

$id = $_GET['id'];

if (isset($connex)) {
    $sql = "DELETE FROM livres WHERE id = :id";
    $stmt = $connex->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        header('Location: affiche_livres.php');
        exit;
    } else {
        echo "Erreur lors de la suppression : " . $connex->errorInfo()[2];
    }
}

$connex = null;
?>