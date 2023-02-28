<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page d'ajout d'un livre</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1rem;
    }

    body {
        background-color: black;
        color: white;
    }

    i {
        color: white;
        margin-right: 1rem;
    }

    a {
        text-decoration: none;
        margin-right: 2rem;
        color: white;
    }

    nav {
        background-color: rgb(48, 96, 255);
        padding: 1.4rem;
    }

    h1 {
        text-align: center;
        margin-top: 2rem;
    }

    select {
        background-color: transparent;
        border: none;
        outline: none;
        color: white;
    }

    .form {
        display: flex;
        height: 80vh;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: right;
    }

    #ajl {
        font-weight: 100;
        font-size: 2rem;
    }

    input[type="text"] {
        width: 20rem;
        margin-bottom: 0.4rem;
    }

    label {
        margin-right: 100px;
        text-align: left;
    }

    .submit {
        text-align: center;
    }
</style>

<body>
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

    // Récupération de l'id du livre
    $id = $_GET['id'];

    // Requête SQL pour récupérer les informations du livre
    $requete = "SELECT * FROM `livres` WHERE id = :id";
    $stmt = $bdd->prepare($requete);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Récupération des résultats
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Erreur lors de l'exécution de la requête
        echo "Erreur lors de l'exécution de la requête";
    }

    // Fermer la connexion à la base de données
    $bdd = null;
    ?>

    <nav>
        <i class="fa-sharp fa-solid fa-book"></i>
        <a href="../accueil.php">Accueil</a>
        <select onchange="la(this.value)">
            <option disabled selected>Livres</option>
            <option value="affiche_livres.php">Afficher les livres</option>
            <option value="form.php">Ajouter un livre</option>
        </select>
        <script>
            function la(src) {
                window.location = src;
            }
        </script>
    </nav>
    <h1>Page de modification</h1>
    <div class="form">
        <h2 id="ajl">Modifier les infos d'un livre</h2>
        <form action="traitementEdit.php?id=<?= $id; ?>" method="post">
            <label for="isbn">ISBN</label>
            <input id="isbn" type="text" name="isbn" value="<?= $row['ISBN'] ?>" /> <br />
            <label for="titre">Titre</label>
            <input id="titre" type="text" name="titre" value="<?= $row['Titre'] ?>" /> <br />
            <label for="theme">Thème</label>
            <input id="theme" type="text" name="theme" value="<?= $row['Theme'] ?>" /> <br />
            <label for="nbpages">Nb pages</label>
            <input id="nbpages" type="text" name="nbpages" value="<?= $row['Nb_pages'] ?>" />
            <br />
            <label for="format">Format</label>
            <input id="format" type="text" name="format" value="<?= $row['Format'] ?>" /> <br />
            <label for="nom">Nom auteur</label>
            <input id="nom" type="text" name="nom" value="<?= $row['Nom_auteur'] ?>" /> <br />
            <label for="prenom">Prénom auteur</label>
            <input id="prenom" type="text" name="prenom" value="<?= $row['Prenom_auteur'] ?>" /> <br />
            <label for="editeur">Éditeur</label>
            <input id="editeur" type="text" name="editeur" value="<?= $row['Editeur'] ?>" /> <br />
            <label for="annee">Année édition</label>
            <input id="annee" type="text" name="annee" value="<?= $row['Annee_edition'] ?>" /> <br />
            <label for="prix">Prix</label>
            <input id="prix" type="text" name="prix" value="<?= $row['Prix'] ?>" /> <br />
            <label for="langue">Langue</label>
            <input id="langue" type="text" name="langue" value="<?= $row['Langue'] ?>" /> <br />
            <div class="submit">
                <input type="submit" value="Ajouter" />
            </div>
        </form>
    </div>

</body>

</html>