<?php
include_once '../Helpers/DbAccess.php';
class AnneeUniv
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new MyPDO('mysql', 'root', 'root', 'SURVIANCE');
    }

    public function getById($id)
    {
        return $this->pdo->where('id_annee',$id)->get('Annee_Univ');
    }
    public function get()
    {
        return $this->pdo->get('Annee_Univ');
    }
}
