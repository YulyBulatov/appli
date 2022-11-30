<?php
    session_start();
    require_once "functions.php"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

            echo var_dump($_SESSION);
            ?>
        </p>

        <nav>
            <?= getMessages() ?>
            <a href="/appli">Page d'accueil</a>
            <a href="recap.php/">Recapitulatif</a>
        </nav>

    </body>
</html>