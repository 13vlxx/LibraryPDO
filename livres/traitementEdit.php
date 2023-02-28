<?php
// connexion db
$dsn = 'mysql:host=localhost;dbname=bd_livres';
$username = 'root';
$password = '';

try {
    $connex = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// récup du livre
if (isset($_GET['id'])) {
    $id = $_GET['id'];
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

    // Préparer la requête d'édition
    $edit = "UPDATE `livres` SET `ISBN`=:isbn, `Titre`=:titre, `Theme`=:theme, `Nb_pages`=:nbpages, `Format`=:format, `Nom_auteur`=:nom, `Prenom_auteur`=:prenom, `Editeur`=:editeur, `Annee_edition`=:annee, `Prix`=:prix, `Langue`=:langue WHERE id=:id";
    $stmt = $connex->prepare($edit);
    $stmt->bindParam(':isbn', $ISBN);
    $stmt->bindParam(':titre', $Titre);
    $stmt->bindParam(':theme', $Theme);
    $stmt->bindParam(':nbpages', $NombrePages);
    $stmt->bindParam(':format', $Format);
    $stmt->bindParam(':nom', $Nom);
    $stmt->bindParam(':prenom', $Prenom);
    $stmt->bindParam(':editeur', $Editeur);
    $stmt->bindParam(':annee', $Annee);
    $stmt->bindParam(':prix', $Prix);
    $stmt->bindParam(':langue', $Langue);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt) {
        header('location: affiche_livres.php');
    } else {
        echo "Erreur lors de la modification";
    }
}

// Clôture de la connexion à la base de données
$connex = null;
?>