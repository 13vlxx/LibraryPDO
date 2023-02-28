<?php

// Connexion à la base de données en utilisant PDO
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_livres', 'root', '');
} catch (PDOException $e) {
    // Erreur de connexion
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible à la base')</script>";
    exit();
}

// User à ajouter dans la base de données
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];

// Envoie une requete sql pour ajouter dans la table users les informations rentrées
$requete = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `password`) 
VALUES (:nom,:prenom,:email,:password)";
$stmt = $bdd->prepare($requete);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

if ($stmt->execute()) {
    // Renvoie vers la page de connexion si l'inscription à été réussie
    header("location: ../index.html");
} else {
    // Insertion impossible
    echo "Insertion impossible";
}

// Fermer la connexion à la base de données
$bdd = null;