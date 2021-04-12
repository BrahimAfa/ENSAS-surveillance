<?php
include_once '../Helpers/DbAccess.php';

class Surviance
{
    public $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function get()
    {
        return $this->pdo->get('Surveillance');
    }
    public function create($data)
    {
        return $this->pdo->insert('Surveillance',$data);
    }
     public function createSurvDetail($data)
    {
        return $this->pdo->insert('Surveillance_Detail',$data);
    }
    public function getSurvId()
    {
        return $this->pdo->insertId();
    }
      public function getSurvianceByListOfIds($idStrings,$dateD,$dateF)
    {
        $where = 'id_surv in ('.$idStrings.') ';
        if(!empty($dateF)){
            $where .=" and `date` between '".$dateD."' and '".$dateF."' ";
        }
        elseif(!empty($dateD)){
            $where .=" and date >= '".$dateD."' ";
        }
        return $this->pdo->query("select * from Surveillance where ".$where." order by date asc");
    }
       public function getSurvianceByListOfIds2()
    {
        return $this->pdo->query("select * from Surveillance  where id_surv in (47)");
    }
}
