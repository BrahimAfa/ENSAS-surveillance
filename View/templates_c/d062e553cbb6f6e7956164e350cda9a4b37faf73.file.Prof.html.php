<?php /* Smarty version Smarty-3.1.16, created on 2021-04-10 21:32:26
         compiled from "../View/templates/Prof.html" */ ?>
<?php /*%%SmartyHeaderCode:331632798606ad3066ac807-29058172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd062e553cbb6f6e7956164e350cda9a4b37faf73' => 
    array (
      0 => '../View/templates/Prof.html',
      1 => 1618090327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '331632798606ad3066ac807-29058172',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606ad3066b4d91_23885786',
  'variables' => 
  array (
    'locals' => 0,
    'messageError' => 0,
    'alert_style' => 0,
    'profs' => 0,
    'prof' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606ad3066b4d91_23885786')) {function content_606ad3066b4d91_23885786($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script>
        var data = <?php echo json_encode($_smarty_tpl->tpl_vars['locals']->value);?>

</script>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php echo $_smarty_tpl->getSubTemplate ("./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <!-- Page Content Holder -->
        <div id="content">

        <?php echo $_smarty_tpl->getSubTemplate ("./navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



    <div style="margin: 0 auto;text-align: center;margin-top: 40px">
        <div class="card" style="width: 70%; margin: 0 auto;text-align: center;">
            <div class="card-header">
                <h2>Ajouter Professeur</h2>
            </div>
            <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
                <div class="alert <?php echo $_smarty_tpl->tpl_vars['alert_style']->value;?>
">
                    <?php echo $_smarty_tpl->tpl_vars['messageError']->value;?>

                </div>
                <?php }?>
                <form method="post" action="Prof.php" >
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="prenom">Prenom:</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="departement">Departement:</label>
                                <select class="form-control" name="departement" id="departement">
                                    <option value="Informatique">Informatique</option>
                                    <option value="Industrielle">Industrielle</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center" style="margin-top: 20px">
                        <button type="submit" class="btn btn-info" name="submit">Ajouter</button>
                        <button class="btn btn-dark" name="annuler">Annuller</button>
                    </div>
                </form>
            </div>

        </div>
        <div style="margin-top: 30px">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nom prof</th>
                    <th>Prenom prof</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody id="dataEtudBody">
                <?php  $_smarty_tpl->tpl_vars['prof'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prof']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prof']->key => $_smarty_tpl->tpl_vars['prof']->value) {
$_smarty_tpl->tpl_vars['prof']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['prof']->value['nom'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['prof']->value['prenom'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['prof']->value['email'];?>
</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php echo $_smarty_tpl->getSubTemplate ("./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
