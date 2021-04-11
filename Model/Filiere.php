<?php
include_once '../Helpers/DbAccess.php';
class Filiere
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function get()
    {
        return $this->pdo->get('Filiere');
    }

    public function getById($idd)
    {
        return $this->pdo->where('id_filiere',$idd)->get('Filiere');
    }
    public function create($table)
    {

        return $this->pdo->insert("Filiere",$table);
    }

    public function isExist($name)
    {
        return $this->pdo->where('intitule',$name)->get("Filiere");
    }
    function delete($id){
        
    }
}
