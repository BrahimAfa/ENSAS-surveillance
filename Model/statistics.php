<?php
include_once '../Helpers/DbAccess.php';
class StatiscticsModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    function getDataByAnneUniv($idUniv){
        return $this->pdo->query("
            select p.nom, p.prenom ,a.annee, count(*) as 'survTotal' from Annee_Univ a
            inner join Surveillance s on s.id_annee=a.id_annee
            inner join Surveillance_Detail ds on s.id_surv = ds.id_surv
            inner join Professeur p  on p.id_prof = ds.id_prof
            where a.id_annee = ".$idUniv."
            group by p.nom, p.prenom
            order by survTotal desc
        ");
    }
    function getDataByAnneUnivAndSemester($idAnneeUniv,$semester){
        return $this->pdo->query("
            select p.nom,p.prenom,m.semestre,count(*) as 'survTotal' from Annee_Univ a
            inner join Surveillance s on s.id_annee=a.id_annee
            inner join Surveillance_Detail ds on s.id_surv = ds.id_surv
            inner join Professeur p  on p.id_prof = ds.id_prof
            inner join Module m on m.id_module = s.id_module
            where a.id_annee = ".$idAnneeUniv."
            and m.semestre='".$semester."'
            group by p.nom, p.prenom,m.semestre
            order by survTotal desc
        ");
    }

        function getDataByDepartment($dep){
        return $this->pdo->query("
            select p.nom,p.prenom,p.department , count(*) as 'survTotal' from Annee_Univ a
            inner join Surveillance s on s.id_annee=a.id_annee
            inner join Surveillance_Detail ds on s.id_surv = ds.id_surv
            inner join Professeur p  on p.id_prof = ds.id_prof
            inner join Module m on m.id_module = s.id_module
            where p.department='".$dep."'
            group by p.nom, p.prenom,p.department
            order by survTotal desc
        ");
    }
}
