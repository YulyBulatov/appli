<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
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
                        "<td><a class='btn btn-primary btn-sm ' href='/appli/traitement.php?action=qtt_up&id=$index' role='button'>+</a> ".$product['qtt']."<a class='btn btn-primary btn-sm ' href='/appli/traitement.php?action=qtt_down&id=$index' role='button'>-</a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a class='btn btn-primary btn-sm ' href='/appli/traitement.php?action=delete&id=$index' role='button'>Supprimer</a></td>",
                    "</tr>";
                $totalGeneral+=$product['total'];
            }
            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "<td></td>",
                    "<td></td>",
                    "<td><a class='btn btn-primary btn-sm ' href='/appli/traitement.php?action=delete_all' role='button'>Supprimer Tout</a></td>",
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
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/appli">Page d'accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/appli/recap.php/">Recapitulatif</a>
            </li>
        </nav>
</body>
</html>