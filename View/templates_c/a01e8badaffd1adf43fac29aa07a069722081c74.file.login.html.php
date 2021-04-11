<?php /* Smarty version Smarty-3.1.16, created on 2021-04-04 21:22:37
         compiled from ".\View\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:633494618606a1642e23553-17437869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a01e8badaffd1adf43fac29aa07a069722081c74' => 
    array (
      0 => '.\\View\\templates\\login.html',
      1 => 1617571269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '633494618606a1642e23553-17437869',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606a1642e564f3_64902954',
  'variables' => 
  array (
    'messageError' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606a1642e564f3_64902954')) {function content_606a1642e564f3_64902954($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<div class="container" >

    <div class="card" style="width: 55%; margin: 0 auto;text-align: center">
        <div class="card-header">
            <h2>Binvenue</h2>
        </div>
        <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
            <div class="alert alert-danger">
                <?php echo $_smarty_tpl->tpl_vars['messageError']->value;?>

            </div>
            <?php }?>
            <form method="post" action="./Controller/login.php" >
                <div class="form-group">
                    <label for="user">Utilisateur:</label>
                    <input type="text" name="user" id="user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de Pass:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-info" name="submit">Connecter</button>
                    <button class="btn btn-dark" name="annuler">Annuller</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html><?php }} ?>
