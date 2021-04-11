<?php

require_once '_config.inc.php';
include_once "../Model/Module.php";
include_once "../Model/Professuer.php";
include_once "../Model/Filiere.php";

$profModel = new Professeur();

$messageError = "";
$alert_style = "";

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $departement = $_POST['departement'];
    $email = $_POST['email'];

    $prof=$profModel->isExist($prenom);
    if ($prof==null){
        $res = $profModel->create(array("nom"=>$nom,"prenom"=>$prenom,"email"=>$email,"department"=>$departement));
        if ($res == true) {
            $messageError = "Le Professeur est ajouter avec succée";
            $alert_style = "alert-success";
        }else{
            $messageError = "Erreur d'ajout ";
            $alert_style = "alert-danger";
        }
    } else {
        $messageError = "Erreur Le Professeur est deja exist ";
        $alert_style = "alert-danger";
    }
    $profs = $profModel->get();
    $tpl->assign('messageError',$messageError);
    $tpl->assign('alert_style',$alert_style);
    $tpl->assign('profs',$profs);
    $tpl->display("Prof.html");
    exit();
}

    $profs = $profModel->get();

    $tpl->assign('profs',$profs);
    $tpl->display("Prof.html");
    exit();
