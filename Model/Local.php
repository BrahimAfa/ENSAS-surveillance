<?php
include_once '../Helpers/DbAccess.php';
class Local
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function get()
    {
        return $this->pdo->get('Local');
    }

    public function getById($id)
    {
        return $this->pdo->where('id_local',$id)->get('Local');
    }
    public function create($data)
    {

        return $this->pdo->insert("Local",$data);
    }

    public function isExist($name)
    {
        return $this->pdo->where('intitule',$name)->get("Local");
    }
}
