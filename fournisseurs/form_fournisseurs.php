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
        <option value="../livres/form.php">Ajouter un livre</option>
        <option value="../livres/affiche_livres.php">Afficher les livres</option>
      </select>
      <select onchange="la(this.value)">
        <option disabled selected>Fournisseurs</option>
        <option value="../fournisseurs/affiche_fournisseurs.php">Afficher les fournisseurs</option>
        <option value="lister_rsociale.php">Lister par Raison sociale</option>
        <option value="lister_localite.php">Lister par Localité</option>
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
  <div class="form">
    <h1>Page d'ajout d'un fournisseur</h1>
    <h2 id="ajl">Veuillez saisir les informations</h2>
    <form action="./insert_fournisseurs.php" method="post">
      <label for="code">Code</label>
      <input required id="rsociale" type="text" name="code" /> <br />
      <label for="rsociale">Raison sociale</label>
      <input required id="rsociale" type="text" name="rsociale" /> <br />
      <label for="rue">Rue fournisseur</label>
      <input required id="rue" type="text" name="rue" />
      <br />
      <label for="cp">Code postal</label>
      <input required id="cp" type="text" name="cp" /> <br />
      <label for="localite">Localité</label>
      <input required id="localite" type="text" name="localite" /> <br />
      <label for="pays">Pays</label>
      <input required id="pays" type="text" name="pays" /> <br />
      <label for="tel">Tel</label>
      <input required id="tel" type="text" name="tel" /> <br />
      <label for="url">URL</label>
      <input required id="url" type="text" name="url" /> <br />
      <label for="email">E-mail</label>
      <input required id="email" type="text" name="email" /> <br />
      <label for="fax">Fax</label>
      <input required id="fax" type="text" name="fax" /> <br />
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