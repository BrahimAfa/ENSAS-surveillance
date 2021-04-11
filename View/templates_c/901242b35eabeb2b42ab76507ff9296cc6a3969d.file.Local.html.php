<?php /* Smarty version Smarty-3.1.16, created on 2021-04-11 02:49:50
         compiled from "../View/templates/Local.html" */ ?>
<?php /*%%SmartyHeaderCode:1781348156606aceaef033a1-36667585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '901242b35eabeb2b42ab76507ff9296cc6a3969d' => 
    array (
      0 => '../View/templates/Local.html',
      1 => 1618109336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1781348156606aceaef033a1-36667585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606aceaef0a468_29640455',
  'variables' => 
  array (
    'messageError' => 0,
    'alert_style' => 0,
    'locals' => 0,
    'local' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606aceaef0a468_29640455')) {function content_606aceaef0a468_29640455($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php echo $_smarty_tpl->getSubTemplate ("./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!-- Page Content Holder -->

    <div id="content">
        <?php echo $_smarty_tpl->getSubTemplate ("./navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div style="margin: 0 auto;text-align: center;margin-top: 100px">
        <div class="card" style="width: 55%; margin: 0 auto;text-align: center;">
            <div class="card-header">
                <h2>Ajouter Local</h2>
            </div>
            <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
                <div class="alert <?php echo $_smarty_tpl->tpl_vars['alert_style']->value;?>
">
                    <?php echo $_smarty_tpl->tpl_vars['messageError']->value;?>

                </div>
                <?php }?>
                <form method="post" action="Local.php" >
                    <div class="form-group">
                        <label for="local">Nom du Local:</label>
                        <input type="text" name="local" id="local" class="form-control" required>
                    </div>

                    <div class="form-group text-center mt-2">
                        <button type="submit" class="btn btn-info" name="submit">Ajouter</button>
                        <button class="btn btn-dark" name="annuler">Annuller</button>
                    </div>
                </form>
            </div>

        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id Local</th>
                    <th>Nom Local</th>
                </tr>
                </thead>
                <tbody id="dataEtudBody">
                <?php  $_smarty_tpl->tpl_vars['local'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['local']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['local']->key => $_smarty_tpl->tpl_vars['local']->value) {
$_smarty_tpl->tpl_vars['local']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['local']->value['id_local'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['local']->value['Intitule'];?>
</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
<?php echo $_smarty_tpl->getSubTemplate ("./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
