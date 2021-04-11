<?php
include_once '../Helpers/DbAccess.php';
class Login
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function loginAdmin($data)
    {
        $result = $this->pdo->where('login', $data["login"])->get('admin');
        if ($this->pdo->numRows()>0) {
            if ($result[0]["mdp"]===$data["mdp"]) {
                return $result[0];
            }
            return null;
        }
        return null;
    }
}
