<?php

require_once '_config.inc.php';
include_once "../Model/login.php";

$model = new Login();

if(isset($_POST['submit'])){
    $user=$model->loginAdmin($_POST);

    if ($user == null) {
        $messageError = "L'utilisateur est inrouvable";
        $tpl->assign('messageError',$messageError);
        $tpl->display("login.html");
        exit();
    }else{
        $tpl->display("Module.html");
        exit();
    }
}else{
    $tpl->display("login.html");
}
