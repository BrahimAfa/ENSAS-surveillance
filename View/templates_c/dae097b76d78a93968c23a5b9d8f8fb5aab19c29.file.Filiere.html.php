<?php /* Smarty version Smarty-3.1.16, created on 2021-04-11 02:49:30
         compiled from "../View/templates/Filiere.html" */ ?>
<?php /*%%SmartyHeaderCode:553357715606a9bb68be1a3-12295266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dae097b76d78a93968c23a5b9d8f8fb5aab19c29' => 
    array (
      0 => '../View/templates/Filiere.html',
      1 => 1618109265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '553357715606a9bb68be1a3-12295266',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606a9bb68d2b45_40916126',
  'variables' => 
  array (
    'locals' => 0,
    'messageError' => 0,
    'alert_style' => 0,
    'filieres' => 0,
    'filiere' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606a9bb68d2b45_40916126')) {function content_606a9bb68d2b45_40916126($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script>
    var data = <?php echo json_encode($_smarty_tpl->tpl_vars['locals']->value);?>

    var dataInputs = {};
</script>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php echo $_smarty_tpl->getSubTemplate ("./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!-- Page Content Holder -->

    <div id="content">
        <?php echo $_smarty_tpl->getSubTemplate ("./navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div style="margin: 0 auto;text-align: center;margin-top: 100px">
    <div class="card" style="width: 55%; margin: 0 auto;text-align: center;">
        <div class="card-header">
            <h2>Ajouter Filiere</h2>
        </div>
        <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
            <div class="alert <?php echo $_smarty_tpl->tpl_vars['alert_style']->value;?>
">
                <?php echo $_smarty_tpl->tpl_vars['messageError']->value;?>

            </div>
            <?php }?>
            <form method="post" action="Filiere.php" >
                <div class="form-group">
                    <label for="filiere">Nom de la filiere:</label>
                    <input type="text" name="filiere" id="filiere" class="form-control" required>
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
                    <th>Id Filiere</th>
                    <th>Nom Fliere</th>
                </tr>
                </thead>
                <tbody id="dataEtudBody">
                <?php  $_smarty_tpl->tpl_vars['filiere'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filiere']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filieres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filiere']->key => $_smarty_tpl->tpl_vars['filiere']->value) {
$_smarty_tpl->tpl_vars['filiere']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['filiere']->value['id_filiere'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['filiere']->value['intitule'];?>
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
