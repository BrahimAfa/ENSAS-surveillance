<?php

require_once '_config.inc.php';
include_once "../Model/Filiere.php";
include_once "../Model/Module.php";
include_once "../Model/AnneeUniv.php";
include_once "../Model/Professuer.php";
include_once "../Model/Local.php";
include_once "../Model/surviance.php";
include_once '../Helpers/MailSpool.php';
include_once '../Model/detailSurviance.php';

$fliereModel = new Filiere();
$moduleModel = new Module();
$anneeModel = new AnneeUniv();
$profModel = new Professeur();
$localModel = new Local();
$survModel = new Surviance();
$detailSurv = new DetailSurviance();
if(isset($_POST['prof'])){
    $result = getListBasedOnProf($_POST['prof']);
    $result2 = getList($result);
    echo json_encode($result2);
    exit;

}
function getListBasedOnProf($prodId){
    global $detailSurv,$survModel,$profModel;
    $profbyNames =  $profModel->getByName($prodId);
    $profSurvs = array();
    foreach ($profbyNames as $row => $valuex) {
        $profSurvs =  $detailSurv->getByIdProf($valuex['id_prof']);
        foreach ($profSurvs as $row => $valuec) {
            $idSurvString.=$valuec['id_surv'].',';
        }
    }
    $idSurvStrings = substr($idSurvString, 0, -1);
    return $survModel->getSurvianceByListOfIds($idSurvStrings);
}
function getList($surv){
    global $fliereModel, $moduleModel, $profModel, $localModel, $detailSurv;

    $survDetailRows = array();
    foreach ($surv as $row => $value) {
        // $survData = array('id_annee'=>, 'id_module' =>,'date' =>, 'HeureD' =>,'HeureF' =>,'Exam' =>);
        $module = reset($moduleModel->getById($value['id_module']));
        $filiere = reset($fliereModel->getById($module['id_filiere']));
        $profsSurv = $detailSurv->getById($value['id_surv']);
        $profsSurvsDetail = array();
        foreach ($profsSurv as $rowx => $valuex) {
        $prof = reset($profModel->getById($valuex['id_prof']));
        $local = reset($localModel->getById($valuex['id_local']));
        $profsSurvsDetail[] = array(
            "nom"=>$prof['nom'],
            "prenom"=>$prof['prenom'],
            "email"=>$prof['email'],
            "department"=>$prof['departement'],
            'local'=>$local['Intitule']
            );

        }

        $survDetailRows[] = array(
            'id_annee'=>$value['id_annee'],
            'id_module'=>$value['id_module'],
            'date'=>$value['date'],
            'HeureD'=>$value['HeureD'],
            'HeureF'=>$value['HeureF'],
            'Exam'=>$value['Exam'],
            'filiere'=>$filiere['intitule'],
            'module'=>$module['intitule'],
            'profs'=>$profsSurvsDetail

        );
    }
    return $survDetailRows;
}
 $surv = $survModel->get();
$tpl->assign('SurvianceDetails',getList($surv));
$tpl->display("survianceDetails.html");
