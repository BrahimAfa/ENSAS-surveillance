<?php /* Smarty version Smarty-3.1.16, created on 2021-04-04 19:34:55
         compiled from ".\View\templates\Index.html" */ ?>
<?php /*%%SmartyHeaderCode:81333083606a14df6ede96-88881636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc320c8c437d32f5dcc3fa9ba993511f440d8b25' => 
    array (
      0 => '.\\View\\templates\\Index.html',
      1 => 1617543198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81333083606a14df6ede96-88881636',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606a14df70e076_98220042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606a14df70e076_98220042')) {function content_606a14df70e076_98220042($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body >

<div class="container" style="margin: 0 auto;text-align: center;margin-top: 100px">
    <div class="page-header">
        <h3>Bienvenu dans l'application de gestion des Absences</h3>
        <h1><small>Bienvenu, se connecter en tant que:</small></h1>
    </div>

    <div>
        <form method="post" action="GetDroit.php">
            <input type="submit" name="admin"  class="btn btn-primary col" value="admin"/>
            <input type="submit" name="prof" class="btn btn-dark col" value="prof"/>
            <input type="submit" name="scolarite" class="btn btn-danger col" value="Scolarite"/>
        </form>

    </div>

</div>

</body>
</html><?php }} ?>
