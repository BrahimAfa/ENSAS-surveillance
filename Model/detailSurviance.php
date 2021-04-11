<?php
include_once '../Helpers/DbAccess.php';
class DetailSurviance
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function get()
    {
        return $this->pdo->get('Surveillance_Detail');
    }

    public function getById($id)
    {
        return $this->pdo->where('id_surv',$id) ->get('Surveillance_Detail');
    }
    public function getByIdProf($id)
    {
        return $this->pdo->where('id_prof',$id) ->get('Surveillance_Detail');
    }
    public function create($table)
    {

        return $this->pdo->insert("Surveillance_Detail",$table);
    }

    public function isExist($name)
    {
        return $this->pdo->where('id_surv',$name)->get("Surveillance_Detail");
    }
}
