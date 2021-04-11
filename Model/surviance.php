<?php
include_once '../Helpers/DbAccess.php';

class Surviance
{
    private $pdo;
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
      public function getSurvianceByListOfIds($idStrings)
    {
        return $this->pdo->query("select * from Surveillance where id_surv in (".$idStrings.")");
    }
       public function getSurvianceByListOfIds2()
    {
        return $this->pdo->query("select * from Surveillance  where id_surv in (47)");
    }
}
