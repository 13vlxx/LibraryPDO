<?php
session_start();

// Connect to the database using PDO
$dsn = 'mysql:host=localhost;dbname=bd_livres';
$username = 'root';
$password = '';

try {
    $connex = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// User to authenticate
$email = $_POST['email'];
$password = $_POST['password'];

// Query the database to check if the user exists
$sql = "SELECT * FROM `users` WHERE mail=:email AND password=:password";
$stmt = $connex->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Check if there is a result
if ($stmt->rowCount() > 0) {
    // Connect the user
    $donnees = $stmt->fetch();
    $nom = $donnees[1];
    $prenom = $donnees[2];
    $isAdmin = $donnees[5];
    print_r($donnees);
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['isAdmin'] = $isAdmin;
    header("Location: ../accueil.php");
} else {
    // Show an error
    header("Location: ../index.html");
}

// Close the connection
$connex = null;