<?php

function getMessages(){

    if(isset($_SESSION["message"]) && !empty($_SESSION["message"])){

        $html = "<div id='message' class='container alert alert-primary'><p>".$_SESSION["message"];
        unset($_SESSION["message"]);

        return $html;
    }

    return false;

}