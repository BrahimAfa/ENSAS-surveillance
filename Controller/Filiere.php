<?php

require_once '_config.inc.php';
include_once "../Model/Filiere.php";

$filiereModel = new Filiere();
$messageError = "";
$alert_style = "";


if (isset($_POST['submit'])) {
    $filiere = $_POST['filiere'];
    if (!empty($filiere) || $filiere != null) {


        $fil = $filiereModel->isExist($filiere);
        if ($fil == false) {
            $res = $filiereModel->create(array("intitule"=>$filiere));
            if ($res == true) {
                $messageError = "La filiere est ajouter avec succée";
                $alert_style = "alert-success";
            } else {
                $messageError = "Erreur d'ajout ";
                $alert_style = "alert-danger";
            }
        } else {
            $messageError = "Erreur La filiere est deja exist ";
            $alert_style = "alert-danger";
        }
    } else {
        $messageError = "Il remplir le nom de la filiere";
        $alert_style = "alert-danger";
    }

    $filieres = $filiereModel->get();
    $_POST['submit'] = null;
    $_POST['filiere'] = "";
    $tpl->assign('messageError', $messageError);
    $tpl->assign('alert_style', $alert_style);
    $tpl->assign('filieres', $filieres);
    $tpl->display("Filiere.html");
    exit;
}
$filieres = $filiereModel->get();
$tpl->assign('filieres', $filieres);

$tpl->display("Filiere.html");
