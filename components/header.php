<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>header</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <style>
    * {
      margin: 0;
      padding: 0;
      color: white;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 1rem;
    }

    .hamburger,
    .fermer {
      display: none;
    }

    body {
      background-color: black;
    }

    i {
      margin-right: 1rem;
    }

    a {
      text-decoration: none;
      margin-right: 2rem;
    }

    select {
      background-color: transparent;
      border: none;
      outline: none;
      cursor: pointer;
    }

    nav {
      background-color: blue;
      padding: 1.4rem;
      display: flex;
      justify-content: space-between;
      background-color: rgb(48, 96, 255);
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

    .right {
      display: flex;
      align-items: center;
    }

    .left {
      display: flex;
    }

    @media (max-width: 660px) {
      .right #nom {
        display: none;
        text-align: right:
      }

      #deco {
        position: absolute;
        bottom: 10px;
        left: 30%;
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
  </style>
  <nav>
    <div class="left">
      <i class="fa-sharp fa-solid fa-book"></i>
      <div class="redirect">
        <a href="accueil.php">Accueil</a>
        <select onchange="la(this.value)">
          <option disabled selected>Livres</option>
          <?php
          if ($_SESSION['isAdmin'] === 1) {
            echo '<option value="livres/form.php">Ajouter un livre</option>';
          }
          ?>
          <option value="livres/affiche_livres.php">Afficher les livres</option>
        </select>
        <?php if ($_SESSION['isAdmin'] === 1) {
          echo '<select onchange="la(this.value)">';
          echo '<option disabled selected>Fournisseurs</option>';
          echo '<option value="fournisseurs/form_fournisseurs.php">Ajouter un fournisseur</option>';
          echo '<option value="fournisseurs/affiche_fournisseurs.php">Afficher les fournisseurs</option>';
          echo '<option value="fournisseurs/lister_rsociale.php">Lister par Raison sociale</option>';
          echo '<option value="fournisseurs/lister_localite.php">Lister par Localité</option>';
          echo '<option value="fournisseurs/lister_pays.php">Lister par Pays</option>';
          echo '</select>';
        }
        ?>
      </div>
      <script>
        function la(src) {
          window.location = src;
        }
      </script>
    </div>
    <div class="right">
      <div id="nom">
        <?php echo "Bonjour " . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' ';
        if ($_SESSION['isAdmin'] === 1) {
          echo $_SESSION['isAdmin'];
        }
        ?>
      </div>
      <i class="fa-sharp fa-solid fa-bars hamburger"></i>
      <i class="fa-sharp fa-solid fa-xmark fermer"></i>
      <a id="deco" href="db/log_out.php"><button>Déconnexion</button></a>
    </div>
  </nav>
</body>

</html>