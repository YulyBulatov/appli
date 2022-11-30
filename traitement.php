<?php
    session_start();

    if(isset($_GET['action'])){

        switch($_GET['action']){

            case "add":

    if(isset($_POST['submit'])){

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){

            $product = [
                "name"  => $name,
                "price" => $price,
                "qtt"   => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION['products'][] = $product;
            $_SESSION["message"] = "Produit enregistré avec succès !";
        }

    }

            case "delete":

                unset($_SESSION['products'][$_GET['id']]);

            case "delete_all":
                
                unset($_SESSION['products']);

            case "qtt_up":

                ++$_SESSION['products'][$_GET['id']]['qtt'];

            case "qtt_down":

                --$_SESSION['products'][$_GET['id']]['qtt'];

}
}


    header("Location:index.php");