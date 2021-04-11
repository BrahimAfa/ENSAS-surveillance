<?php
include_once '../Helpers/DbAccess.php';
class Professeur
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function get()
    {
        return $this->pdo->get('Professeur');
    }
        public function create($data)
    {

        return $this->pdo->insert("Professeur",$data);
    }

    public function getById($id)
    {
        return $this->pdo->where('id_prof',$id)->get('Professeur');
    }

     public function getByName($name)
    {
        return $this->pdo->query("select * from  Professeur where nom like '%".$name."%' or prenom like '%".$name."%'");
    }

    public function isExist($name)
    {
        return $this->pdo->where('prenom',$name)->get("Professeur");
    }
}
