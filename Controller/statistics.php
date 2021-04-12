<?php

require_once '_config.inc.php';
include_once "../Model/statistics.php";
include_once "../Model/AnneeUniv.php";

$statsModel = new StatiscticsModel();
$anneeModel = new AnneeUniv();

if(isset($_POST['semestre'])) {
  $idAnnee = $_POST['id_annee'];
    $semestre = $_POST['semestre'];
    $anneeStatsData = $statsModel->getDataByAnneUnivAndSemester($idAnnee,$semestre);
    echo json_encode($anneeStatsData);
    exit;
}else if (isset($_POST['departement'])) {
    $dep = $_POST['departement'];
    $anneeStatsData = $statsModel->getDataByDepartment($dep);
    echo json_encode($anneeStatsData);
    exit;
} else if (isset($_POST['id_annee'])) {
    $idAnnee = $_POST['id_annee'];
    $anneeStatsData = $statsModel->getDataByAnneUniv($idAnnee);
    echo json_encode($anneeStatsData);
    exit;
}
$anneesUnivs = $anneeModel->get();

$tpl->assign('anneesUnivs',$anneesUnivs);

$tpl->display("statistics.html");
