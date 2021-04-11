<?php

require_once '_config.inc.php';
include_once "../Model/Module.php";
include_once "../Model/Professuer.php";
include_once "../Model/Filiere.php";

$profModel = new Professeur();
$filiereModel = new Filiere();
$moduleModel = new Module();

$messageError = "";
$alert_style = "";

if(isset($_POST['submit'])){
    $module = $_POST['module'];
    $filiere = $_POST['filiere'];
    $semestre = $_POST['semestre'];
    $prof = $_POST['prof'];
        $fil=$moduleModel->isExist($module);
        if ($fil==false){
            $res = $moduleModel->create(array("id_prof"=>$prof,"intitule"=>$module,"semestre"=>$semestre,"id_filiere"=>$filiere));
            if ($res == true) {
                $messageError = "La filiere est ajouter avec succée";
                $alert_style = "alert-success";
            }else{
                $messageError = "Erreur d'ajout ";
                $alert_style = "alert-danger";
            }
        } else {
            $messageError = "Erreur Le Module est deja exist ";
            $alert_style = "alert-danger";
        }
   $filieres = $filiereModel->get();
    $profs = $profModel->get();
    $modules = $moduleModel->get();
//    $_POST['submit'] = null;
//    $_POST['filiere'] = "";
    $tpl->assign('messageError',$messageError);
    $tpl->assign('alert_style',$alert_style);
   $tpl->assign('filieres',$filieres);
    $tpl->assign('modules',$modules);
    $tpl->assign('profs',$profs);
    $tpl->display("Module.html");
    exit();
}

   $filieres = $filiereModel->get();
    $profs = $profModel->get();
    $modules = $moduleModel->get();
   $tpl->assign('filieres',$filieres);
    $tpl->assign('modules',$modules);
    $tpl->assign('profs',$profs);
    $tpl->display("Module.html");
