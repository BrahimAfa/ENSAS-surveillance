<?php /* Smarty version Smarty-3.1.16, created on 2021-04-11 02:49:45
         compiled from "../View/templates/Module.html" */ ?>
<?php /*%%SmartyHeaderCode:1524011828606a32e9e71fb8-11822479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '861b81a49c9aef7de7f82c389e350553d439e51b' => 
    array (
      0 => '../View/templates/Module.html',
      1 => 1618109331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1524011828606a32e9e71fb8-11822479',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606a32e9e73165_82914223',
  'variables' => 
  array (
    'messageError' => 0,
    'alert_style' => 0,
    'filieres' => 0,
    'filiere' => 0,
    'profs' => 0,
    'prof' => 0,
    'modules' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606a32e9e73165_82914223')) {function content_606a32e9e73165_82914223($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php echo $_smarty_tpl->getSubTemplate ("./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!-- Page Content Holder -->

    <div id="content">
        <?php echo $_smarty_tpl->getSubTemplate ("./navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div style="margin: 0 auto;text-align: center;margin-top: 40px">
        <div class="card" style="width: 70%; margin: 0 auto;text-align: center;">
            <div class="card-header">
                <h2>Ajouter Module</h2>
            </div>
            <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
                <div class="alert <?php echo $_smarty_tpl->tpl_vars['alert_style']->value;?>
">
                    <?php echo $_smarty_tpl->tpl_vars['messageError']->value;?>

                </div>
                <?php }?>
                <form method="post" action="Module.php" >
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="module">Nom de Module:</label>
                                <input type="text" name="module" id="module" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="semestre">Semestre:</label>
                                <select class="form-control" name="semestre" id="semestre">
                                    <option value="Semaistre 1">Semaistre 1</option>
                                    <option value="Semaistre 2">Semaistre 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px">
                        <div class="col">
                            <div class="form-group">
                                <label for="filiere">Filiere:</label>
                                <select class="form-control" name="filiere" id="filiere">
                                     <option value="-1" selected disabled>selelct Filiere</option>

                                    <?php  $_smarty_tpl->tpl_vars['filiere'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filiere']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filieres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filiere']->key => $_smarty_tpl->tpl_vars['filiere']->value) {
$_smarty_tpl->tpl_vars['filiere']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['filiere']->value['id_filiere'];?>
"><?php echo $_smarty_tpl->tpl_vars['filiere']->value['intitule'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="prof">Professeur:</label>
                                <select class="form-control" name="prof" id="prof">
                                <option value="-1" selected disabled>selelct Professeur</option>

                                    <?php  $_smarty_tpl->tpl_vars['prof'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prof']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prof']->key => $_smarty_tpl->tpl_vars['prof']->value) {
$_smarty_tpl->tpl_vars['prof']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['prof']->value['id_prof'];?>
"><?php echo $_smarty_tpl->tpl_vars['prof']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['prof']->value['prenom'];?>
}</option>
                                    <?php } ?>
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
                    <th>Id Module</th>
                    <th>Nom Module</th>
                    <th>Semestre</th>
                </tr>
                </thead>
                <tbody id="dataEtudBody">
                <?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['module']->value['id_module'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['module']->value['intitule'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['module']->value['semestre'];?>
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
