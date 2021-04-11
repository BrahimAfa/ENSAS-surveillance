<?php
 include '../outils/fpdf/fpdf.php';
 include '../outils/exfpdf.php';
 include '../outils/easyTable.php';

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

 $pdf=new exFPDF();
 $pdf->SetFont('helvetica','',10);
 $pdf->AddPage('O','A4');
 $pdf->SetAutoPageBreak(false);
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
        $profResponsable = reset($profModel->getById($module['id_prof']));

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
            'responsable'=>$profResponsable['nom'].' '.$profResponsable['prenom'],
            'profs'=>$profsSurvsDetail

        );
    }
    return $survDetailRows;
}
//====================================================================>>
if (isset($_POST['prof'])) {

    $result = getListBasedOnProf($_POST['prof']);
    $survDetails = getList($result);
// echo var_dump($survDetails);
$table1=new easyTable($pdf,'{20,40,60,50,30,20,90}','width:100; align:C{LC}; border:RL; border-color:#fff; border-width:0.7');
$table1->rowStyle('align:{CCCR};valign:M;bgcolor:#21468E; font-color:#ffffff; font-family:times; font-style:B; margin:10;');

 $table1->easyCell('Calendrier des Surveillances des 2eme DS de CP1','colspan:7');
  $table1->printRow();
   $table1->endTable(10);

$pdf->ln();

 $table=new easyTable($pdf, '{20,40,60,50,30,20,90}','width:100;align:C{LC}; border:RL; border-color:#fff; border-width:0.7');

 $table->rowStyle('align:{CCCR};valign:M;bgcolor:#993333;font-color:#ffffff; font-family:times; font-style:B; margin:10;');
 $table->easyCell('Filiere');
 $table->easyCell('Responsable');
 $table->easyCell('intitule du module ');
 $table->easyCell('Date de lexamen');
 $table->easyCell('Heure');
 $table->easyCell('Local');
 $table->easyCell('Surveillant');
  $table->printRow();
  $colors = array('#E9F8FF',"#FAD586",'#D5ECC2',"#BFCBA8","#F8EDE3","#29BB89");
  $prevDate = "";
  $colorsIndex = -1;
foreach ($survDetails as $row => $value) {
  if($prevDate!==$value['date']){
    $colorsIndex++;
    $prevDate = $value['date'];
  }
  $color = $colors[$colorsIndex];
 $table->rowStyle('valign:M;border:1;paddingY:2;bgcolor:'.$color.';border-color:#fff');
 $table->easyCell($value['filiere'].' '.count($value['profs']), 'rowspan:'.(count($value['profs'])+1));
 $table->easyCell($value['responsable'], 'rowspan:'.(count($value['profs'])+1));
 $table->easyCell($value['module'], 'rowspan:'.(count($value['profs'])+1));
 $table->easyCell($value['date'], 'rowspan:'.(count($value['profs'])+1));
 $table->easyCell($value['HeureD']." ~ ".$value['HeureF'], 'rowspan:'.(count($value['profs'])+1));
 $table->printRow();
// ------------------------------------------------------------------------------1
foreach ($value['profs'] as $row => $prof) {
  $table->rowStyle('border:1; border-color:#fff;bgcolor:'.$color);
  $table->easyCell($prof['local']);
  $table->easyCell($prof['nom'].' '.$prof['prenom'],);
  $table->printRow(true);
}
 }

 $table->endTable(10);

 $pdf->Output();
}

else{
  echo 'hello';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>fpdf</title>
</head>
<body>
<form method="post">
  <input type="submit" name="prof" value="bra">
</form>
</body>
</html>
