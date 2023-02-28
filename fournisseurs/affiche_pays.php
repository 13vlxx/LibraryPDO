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
            <option value="../livres/form.php">Ajouter un livre</option>
            <option value="../livres/affiche_livres.php">Afficher les livres</option>
        </select>
        <select onchange="la(this.value)">
            <option disabled selected>Fournisseurs</option>
            <option value="../fournisseurs/form_fournisseurs.php">Ajouter un fournisseur</option>
            <option value="../fournisseurs/form_fournisseurs.php">Ajouter un fournisseur</option>
            <option value="lister_rsociale.php">Lister par Raison sociale</option>
            <option value="lister_localite.php">Lister par Localité</option>
        </select>
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
try {
    $connex = new PDO('mysql:host=localhost;dbname=bd_livres', 'root', '');
} catch (PDOException $e) {
    echo "<script type=text/javascript>";
    echo "alert('Connexion impossible à la base')</script>";
    exit();
}

//* Connexion réussie

$pays = $_POST['pays'];
$requete = "SELECT * FROM fournisseur WHERE pays = :pays";
$result = $connex->prepare($requete);
$result->bindParam(':pays', $pays);
$result->execute();
/* $nb = mysqli_num_rows($result);
echo 'Il y a ' . $nb . ' utilisateur(s).';
echo '<br>'; */
//* Affiche toutes les infos des utilisateurs sous forme de tableau
echo "<table border='1'>";
echo '<td id="info" style="font-weight: bolder">' . 'Code' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Raison Sociale' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Rue' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Code postal' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Localité' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Pays' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Tel' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Lien' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Email' . "</td>";
echo '<td id="info" style="font-weight: bolder">' . 'Fax' . "</td>";
while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
    echo "<tr>";
    echo "<td>" . $donnees->code_fournisseur . "</td>";
    echo "<td>" . $donnees->raison_sociale . "</td>";
    echo "<td>" . $donnees->rue_fournisseur . "</td>";
    echo "<td>" . $donnees->code_postal . "</td>";
    echo "<td>" . $donnees->localite . "</td>";
    echo "<td>" . $donnees->pays . "</td>";
    echo "<td>" . $donnees->tel_fournisseur . "</td>";
    echo "<td>" . $donnees->url_fournisseur . "</td>";
    echo "<td>" . $donnees->email_fournisseur . "</td>";
    echo "<td>" . $donnees->fax_fournisseur . "</td>";
    echo "</tr>";
}
echo "</table>";
session_start();
$idLigne = $donnees['Id'];
$_SESSION['idLigne'] = $idLigne;
include './include/footer.php';
$connex = null;
?>