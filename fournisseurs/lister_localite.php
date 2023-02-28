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
        display: flex;
        justify-content: space-between;
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

    button {
        background: white;
        color: black;
        border: 2px solid black;
        padding: .1rem .2rem;
        cursor: pointer;
        border-radius: 10px;
        margin-left: 1rem;
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

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 70vh;
    }

    @media (max-width: 660px) {
        .right #nom {
            display: none;
            text-align: right:
        }

        #deco {
            position: absolute;
            top: 20px;
            right: 0;
            margin: 0;
        }

        #deco a {
            margin: 0;
        }

        /* .right a {
        display: block;
      }

      .hamburger {
        display: block;
        margin-left: 1.2rem;
      } */

        nav {
            flex-direction: column;
        }

    }

    @media (max-width: 540px) {

        .form {
            margin-top: 8rem;
        }

        form {
            display: flex;
            flex-direction: column;
        }


    }
</style>

<body>
    <nav>
        <div class="left">
            <i class="fa-sharp fa-solid fa-book"></i>
            <a href="../accueil.php">Accueil</a>
            <select onchange="la(this.value)">
                <option disabled selected>Livres</option>
                <option value="../livres/form.php">Ajouter un livre</option>
                <option value="../livres/affiche_livres.php">Afficher les livres</option>
            </select>
            <select onchange="la(this.value)">
                <option disabled selected>Fournisseurs</option>
                <option value="../fournisseurs/affiche_fournisseurs.php">Afficher les fournisseurs</option>
                <option value="../fournisseurs/form_fournisseurs.php">Ajouter un fournisseur</option>
                <option value="lister_rsociale.php">Lister par Raison sociale</option>
                <option value="lister_pays.php">Lister par Pays</option>
            </select>
            <script>
                function la(src) {
                    window.location = src;
                }
            </script>
        </div>
        <a id="deco" href="../db/log_out.php"><button>Déconnexion</button></a>
    </nav>
    <main>
        <form action="affiche_localite.php" method="post">
            <select name="localite" id="select">
                <option value="#" disabled selected>Saissisez la localité</option>
                <?php
                // Connect to the database using PDO
                $dsn = 'mysql:host=localhost;dbname=bd_livres';
                $username = 'root';
                $password = '';

                try {
                    $connex = new PDO($dsn, $username, $password);
                    $requete = "SELECT DISTINCT localite FROM fournisseur";
                    $result = $connex->prepare($requete);
                    $result->execute();
                    while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
                        echo '<option value="' . $donnees->localite . '">' . $donnees->localite . '</option>';
                    }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                    exit();
                }

                ?>
            </select>
            <input type="submit" name="envoyer" id="envoyer">
        </form>
    </main>
</body>

</html>

<?php
//* Test du fonctionnement du formulaire
/* foreach ($_POST as $key =>
$value) { echo '<br />' . $key . '=>' . $value; } echo '<br />' . $_POST['isbn']; echo '<br />' .
$_POST['titre']; echo '<br />' . $_POST['theme']; echo '<br />' . $_POST['nbpages']; echo '<br />' .
$_POST['format']; echo '<br />' . $_POST['nom']; echo '<br />' . $_POST['prenom']; echo '<br />' .
$_POST['editeur']; echo '<br />' . $_POST['annee']; echo '<br />' . $_POST['prix']; echo '<br />' .
$_POST['langue']; */include 'include/footer.php';
?>