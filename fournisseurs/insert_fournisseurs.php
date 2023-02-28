<?php

try {
    $connex = new PDO('mysql:host=localhost;dbname=bd_livres', 'root', '');
} catch (PDOException $e) {
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible à la base')</script>";
    exit();
}

$code = $_POST['code'];
$rsociale = $_POST['rsociale'];
$rue = $_POST['rue'];
$cp = $_POST['cp'];
$localite = $_POST['localite'];
$pays = $_POST['pays'];
$tel = $_POST['tel'];
$lien = $_POST['url'];
$email = $_POST['email'];
$fax = $_POST['fax'];

$stmt = $connex->prepare("INSERT INTO `fournisseur`(`code_fournisseur`, `raison_sociale`, `rue_fournisseur`, `code_postal`, `localite`, `pays`, `tel_fournisseur`, `url_fournisseur`, `email_fournisseur`, `fax_fournisseur`) 
VALUES (:code, :rsociale, :rue, :cp, :localite, :pays, :tel, :lien, :email, :fax)");

$stmt->bindParam(':code', $code);
$stmt->bindParam(':rsociale', $rsociale);
$stmt->bindParam(':rue', $rue);
$stmt->bindParam(':cp', $cp);
$stmt->bindParam(':localite', $localite);
$stmt->bindParam(':pays', $pays);
$stmt->bindParam(':tel', $tel);
$stmt->bindParam(':lien', $lien);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':fax', $fax);

if ($stmt->execute()) {
    header("Location: affiche_fournisseurs.php");
} else {
    echo "Insertion impossible";
}

$connex = null; // Fermeture de la connexion PDO
?>