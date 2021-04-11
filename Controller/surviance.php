<?php

require_once '_config.inc.php';
include_once "../Model/Filiere.php";
include_once "../Model/Module.php";
include_once "../Model/AnneeUniv.php";
include_once "../Model/Professuer.php";
include_once "../Model/Local.php";
include_once "../Model/surviance.php";
include_once '../Helpers/MailSpool.php';

$fliereModel = new Filiere();
$moduleModel = new Module();
$anneeModel = new AnneeUniv();
$profModel = new Professeur();
$localModel = new Local();
$survModel = new Surviance();

function parseDataAndSendMail($prof,$surv,$filier,$local){

    $fullName = $prof['nom'].' '. $prof['prenom'];
    $data= array(
    "FullName"=>$fullName,
    "Exam"=> $surv['Exam'],
    "Filiere"=>$filier['intitule'],
    "Local"=> $local['Intitule'],
    "date"=>$surv['date'],
    "HeureD"=>$surv['HeureD'],
    "HeureF"=>$surv['HeureF']
    );
    MailSpool::addMail($prof['email'], $fullName, 'About The Surviance',$data);
}
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $filieres = $fliereModel->get();
    $modules = $moduleModel->get();
    $anneesUnivs = $anneeModel->get();
    $professeurs = $profModel->get();
    $locals = $localModel->get();
    $tpl->assign('filieres',$filieres);
    $tpl->assign('modules',$modules);
    $tpl->assign('anneesUnivs',$anneesUnivs);
    $tpl->assign('professeurs',$professeurs);
    $tpl->assign('locals',$locals);

}else{
    // insert
    $data = file_get_contents( "php://input" ); //$data is now the string '[1,2,3]';

    $data = json_decode($data,true);
    $survData = array('id_annee'=>$data['id_annee'], 'id_module' => $data['id_module'],'date' => $data['date'], 'HeureD' => $data['HeureD'],'HeureF' => $data['HeureF'],'Exam' => $data['Exam']);
    $resutl = $survModel->create($survData);
    $survId =  $survModel->getSurvId();;
    $survDetaiData;

    foreach($data['details'] as $localId => $value) {
         foreach ($value as $surviant){
             $profSurvId= explode("#",explode("-", $surviant)[0])[1];
            $survDetaiData=  array('id_surv'=>$survId,'id_prof'=>$profSurvId,'id_local'=> $localId);
            $survModel->createSurvDetail($survDetaiData);
            $prof = $profModel->getById($profSurvId);
            $module = $moduleModel->getById($survData['id_module']);
            $filiere = $fliereModel->getById($module[0]['id_filiere']);
            $local = $localModel->getById($localId);
            parseDataAndSendMail($prof[0],$survData,$filiere[0],$local[0]);
         }
    }
    register_shutdown_function('MailSpool::send');
    echo "email are bieng processed";
    exit;
}

$tpl->display("surviance.html");
