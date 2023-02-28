<?php
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
?>
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
        <option value="affiche_livres.php">Afficher les livres</option>
      </select>
      <select onchange="la(this.value)">
        <option disabled selected>Fournisseurs</option>
        <option value="../fournisseurs/form_fournisseurs.php">Ajouter un fournisseur</option>
        <option value="../fournisseurs/affiche_fournisseurs.php">Afficher les fournisseurs</option>
        <option value="../fournisseurs/lister_rsociale.php">Lister par Raison sociale</option>
        <option value="../fournisseurs/lister_localite.php">Lister par Localité</option>
        <option value="../fournisseurs/lister_pays.php">Lister par Pays</option>
      </select>
      <script>
        function la(src) {
          window.location = src;
        }
      </script>
    </div>
    <a id="deco" href="../db/log_out.php"><button>Déconnexion</button></a>
  </nav>
  <div class="form">
    <h1>Page d'ajout d'un livre</h1>
    <h2 id="ajl">Ajouter un livre</h2>
    <form action="./insert_livres.php" method="post">
      <label for="isbn">ISBN</label>
      <input required id="isbn" type="text" name="isbn" /> <br />
      <label for="titre">Titre</label>
      <input required id="titre" type="text" name="titre" /> <br />
      <label for="theme">Thème</label>
      <input required id="theme" type="text" name="theme" /> <br />
      <label for="nbpages">Nb pages</label>
      <input required id="nbpages" type="text" name="nbpages" />
      <br />
      <label for="format">Format</label>
      <input required id="format" type="text" name="format" /> <br />
      <label for="nom">Nom auteur</label>
      <input required id="nom" type="text" name="nom" /> <br />
      <label for="prenom">Prénom auteur</label>
      <input required id="prenom" type="text" name="prenom" /> <br />
      <label for="editeur">Éditeur</label>
      <input required id="editeur" type="text" name="editeur" /> <br />
      <label for="annee">Année édition</label>
      <input required id="annee" type="text" name="annee" /> <br />
      <label for="prix">Prix</label>
      <input required id="prix" type="text" name="prix" /> <br />
      <label for="langue">Langue</label>
      <input required id="langue" type="text" name="langue" /> <br />
      <div class="submit">
        <input type="submit" value="Ajouter" />
      </div>
    </form>
  </div>
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