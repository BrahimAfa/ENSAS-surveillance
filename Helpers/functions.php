<?php

function centerHtmlText($message){
    return "<center><b>".$message."</b><center>";
}

function redirectTo($page){
    header("Location: ".$page);
    exit;
}


function confirmLoggedIn($url) {
    if (!isset($_SESSION["login"])){
        redirectTo($url);
    }
}

function Logout() {
    session_destroy();
    redirectTo('../index.php');
}
