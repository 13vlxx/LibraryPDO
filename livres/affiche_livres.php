<?php session_start(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1rem;
    }

    body {
        background-color: black;
    }

    i {
        color: white;
        margin-right: 1rem;
    }

    a {
        text-decoration: none;
        margin-right: 2rem;
        color: white;
        cursor: pointer;
    }

    nav {
        background-color: rgb(48, 96, 255);
        padding: 1.4rem;
        display: flex;
        justify-content: space-between;
    }

    select {
        background-color: transparent;
        border: none;
        outline: none;
        color: white;
    }

    table {
        border: 1px solid black;
        position: absolute;
        top: 25%;
        left: 2.5%;
        background: transparent;
        color: white;
        border-collapse: collapse;
    }

    tr:nth-child(2n+1) {
        color: lightgreen;
    }

    td {
        border: 1px solid white;
        padding: .5rem;
    }

    @media screen and (max-width: 1100px) {

        table tr,
        table td {
            display: block;
            width: 100%;
            font-size: 2.2rem;
            padding: 1rem;
        }

        td a {
            font-size: 3rem;
        }

        #info {
            display: none;
        }
    }
</style>
<nav>
    <div class="left">
        <i class="fa-sharp fa-solid fa-book"></i>
        <a href="../accueil.php">Accueil</a>
        <select onchange="la(this.value)">
            <option disabled selected>Livres</option>
            <option value="form.php">Ajouter un livre</option>
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
        <script>
            function la(src) {
                window.location = src;
            }
        </script>
    </div>
    <a href="../db/log_out.php"><button
            style="background: white; color: black; border: 2px solid black; padding: .1rem .2rem; cursor: pointer; margin-left: 2rem; border-radius: 10px;">Déconnexion</button></a>
</nav>
<?php
$dsn = 'mysql:host=localhost;dbname=bd_livres';
$username = 'root';
$password = '';

try {
    $connex = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
//* Connexion réussie

$requete = "SELECT * FROM livres";
$result = $connex->prepare($requete);
$result->execute();
/* $nb = mysqli_num_rows($result);
echo 'Il y a ' . $nb . ' utilisateur(s).';
echo '<br>'; */
//* Affiche toutes les infos des utilisateurs sous forme de tableau
echo "<table border='1'>";
echo '<td id="info" style="font-weight: bolder">' . 'ISBN' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Titre' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Thème' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Nombre de pages' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Format' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Auteur' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Editeur' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Année d\'edition' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Prix' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Langue' . "</td>";
if ($_SESSION['isAdmin'] === 1) {
    echo '<td id="info" style="font-weight: bolder">' . 'Modifier' . "</td>";
    echo '<td id="info" style="font-weight: bolder">' . 'Supprimer' . "</td>";
}
while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "<td>" . $donnees->ISBN . "</td>";
    echo "<td>" . $donnees->Titre . "</td>";
    echo "<td>" . $donnees->Theme . "</td>";
    echo "<td>" . $donnees->Nb_pages . "</td>";
    echo "<td>" . $donnees->Format . "</td>";
    echo "<td>" . $donnees->Nom_auteur . ' ' . $donnees->Prenom_auteur . "</td>";
    echo "<td>" . $donnees->Editeur . "</td>";
    echo "<td>" . $donnees->Annee_edition . "</td>";
    echo "<td>" . $donnees->Prix . "</td>";
    echo "<td>" . $donnees->Langue . "</td>";
    if ($_SESSION['isAdmin'] === 1) {
        echo "<td> <a href='edit.php?id=" . $donnees->Id . "'>📝</a> </td>";
        echo "<td> <a href='suppr.php?id=" . $donnees->Id . "'>🗑️</a></td>";
    }
    echo "</tr>";
}
echo "</table>";
$idLigne = $donnees['Id'];
$_SESSION['idLigne'] = $idLigne;
include './include/footer.php';