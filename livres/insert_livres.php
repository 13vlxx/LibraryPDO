<?php

try {
    $connex = new PDO('mysql:host=localhost;dbname=bd_livres', 'root', '');
} catch (PDOException $e) {
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible à la base')</script>";
    exit();
}

$ISBN = $_POST['isbn'];
$Titre = $_POST['titre'];
$Theme = $_POST['theme'];
$NombrePages = $_POST['nbpages'];
$Format = $_POST['format'];
$Nom = $_POST['nom'];
$Prenom = $_POST['prenom'];
$Editeur = $_POST['editeur'];
$Annee = $_POST['annee'];
$Prix = $_POST['prix'];
$Langue = $_POST['langue'];

$stmt = $connex->prepare("INSERT INTO `livres`(`ISBN`, `Titre`, `Theme`, `Nb_pages`, `Format`, `Nom_auteur`, `Prenom_auteur`, `Editeur`, `Annee_edition`, `Prix`, `Langue`) 
VALUES (:ISBN, :Titre, :Theme, :NombrePages, :Format, :Nom, :Prenom, :Editeur, :Annee, :Prix, :Langue)");

$stmt->bindParam(':ISBN', $ISBN);
$stmt->bindParam(':Titre', $Titre);
$stmt->bindParam(':Theme', $Theme);
$stmt->bindParam(':NombrePages', $NombrePages);
$stmt->bindParam(':Format', $Format);
$stmt->bindParam(':Nom', $Nom);
$stmt->bindParam(':Prenom', $Prenom);
$stmt->bindParam(':Editeur', $Editeur);
$stmt->bindParam(':Annee', $Annee);
$stmt->bindParam(':Prix', $Prix);
$stmt->bindParam(':Langue', $Langue);

if ($stmt->execute()) {
    header("Location: affiche_livres.php");
} else {
    echo "Insertion impossible";
}

$connex = null; // Fermeture de la connexion PDO
?>