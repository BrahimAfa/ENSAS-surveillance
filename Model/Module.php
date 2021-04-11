<?php
include_once '../Helpers/DbAccess.php';
class Module
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function get()
    {
        return $this->pdo->get('Module');
    }
    public function create($data)
    {

        return $this->pdo->insert("Module",$data);
    }


    public function getById($id)
    {
        return $this->pdo->where('id_module',$id)->get('Module');
    }

    public function isExist($name)
    {
        return $this->pdo->where('intitule',$name)->get("Module");
    }
}
