<?php

require_once '_config.inc.php';
include_once "../Model/Local.php";

$localModel = new Local();
$messageError = "";
$alert_style = "";

if(isset($_POST['submit'])){
    $local = $_POST['local'];

        $fil=$localModel->isExist($local);
        if ($fil==false){
            $res = $localModel->create(array("intitule"=>$local));
            if ($res == true) {
                $messageError = "La lOCAL est ajouter avec succée";
                $alert_style = "alert-success";
            }else{
                $messageError = "Erreur d'ajout ";
                $alert_style = "alert-danger";
            }
        } else {
            $messageError = "Erreur La Local est deja exist ";
            $alert_style = "alert-danger";
        }



    $locals=$localModel->get();
    $tpl->assign('messageError',$messageError);
    $tpl->assign('alert_style',$alert_style);
    $tpl->assign('locals',$locals);
    $tpl->display("Local.html");
    exit;


}

   $locals=$localModel->get();
    $tpl->assign('locals',$locals);
    $tpl->display("Local.html");
