<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th>Actions</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='/appli/traitement.php?action=qtt_up&id=$index'>+</a>".$product['qtt']."<a href='/appli/traitement.php?action=qtt_down&id=$index'>-</a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='/appli/traitement.php?action=delete&id=$index'>Supprimer</a></td>",
                    "</tr>";
                $totalGeneral+=$product['total'];
            }
            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "<td></td>",
                    "<td></td>",
                    "<td><a href='/appli/traitement.php?action=delete_all'>Supprimer Tout</a></td>",
                  "</tr>",  
                "</tbody>",
                "</table>";

        }
    ?>

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
            <a href="/appli">Page d'accueil</a>
            <a href="/appli/recap.php">Recapitulatif</a>
        </nav>
</body>
</html>