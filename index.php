<?php
    session_start();
    require_once "functions.php"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <title>Ajout produit</title>
    </head>
    <body>

        <h1>Ajouter un produit</h1>

        <form action="traitement.php?action=add" method="post">
            <p>
                <label>
                    Nom de produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix de produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>
        </form>

        <h2>Le nombre de produits en session:</h2>
        <p>
            <?php
            if (empty($_SESSION['products'])){
                echo "0";
            }
            else{
                echo count($_SESSION['products']);
            }
            ?>
        </p>

        <nav>
            <?= getMessages() ?>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/appli">Page d'accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="recap.php/">Recapitulatif</a>
            </li>
        </nav>

    </body>
</html>