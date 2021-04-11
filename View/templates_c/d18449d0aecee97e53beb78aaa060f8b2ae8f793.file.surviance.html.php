<?php /* Smarty version Smarty-3.1.16, created on 2021-04-11 19:26:52
         compiled from "../View/templates/surviance.html" */ ?>
<?php /*%%SmartyHeaderCode:501194156606a37548d0ae0-11338829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd18449d0aecee97e53beb78aaa060f8b2ae8f793' => 
    array (
      0 => '../View/templates/surviance.html',
      1 => 1618168538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '501194156606a37548d0ae0-11338829',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_606a37548d3c12_17923221',
  'variables' => 
  array (
    'locals' => 0,
    'messageError' => 0,
    'alert_style' => 0,
    'message' => 0,
    'modules' => 0,
    'module' => 0,
    'filieres' => 0,
    'filiere' => 0,
    'anneesUnivs' => 0,
    'annee' => 0,
    'professeurs' => 0,
    'pro' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_606a37548d3c12_17923221')) {function content_606a37548d3c12_17923221($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script>
        var data = <?php echo json_encode($_smarty_tpl->tpl_vars['locals']->value);?>

        var dataInputs = {};

</script>
<script src="../View/templates/scripts/surviance.js"></script>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php echo $_smarty_tpl->getSubTemplate ("./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <!-- Page Content Holder -->
        <div id="content">

        <?php echo $_smarty_tpl->getSubTemplate ("./navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="card m-auto w-50">
            <div class="card-header text-lg-center">
                <h2>Surviance</h2>
            </div>
            <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['messageError']->value!='') {?>
                <div class="alert <?php echo $_smarty_tpl->tpl_vars['alert_style']->value;?>
">
                    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

                </div>
                <?php }?>
                <form method="post" action="admin.php">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="filiere" class="control-label">Module</label>
                                <select onchange="changeInput(this)" class="form-control" name="id_module" id="module">
                                    <option value="-1" selected disabled>selelct Module</option>

                                    <?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['module']->value['id_module'];?>
"><?php echo $_smarty_tpl->tpl_vars['module']->value['intitule'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Exam" class="control-label">Module</label>
                                <select onchange="changeInput(this)" class="form-control" name="Exam" id="module">
                                    <option value="-1" selected disabled>selelct Exam</option>
                                    <option value="DS1">devoir surveillé 1</option>
                                    <option value="DS2">devoir surveillé 2</option>
                                    <option value="RATTRAPAGE">Rattrapage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="filiere" class="control-label">Filière</label>
                                <select onchange="changeInput(this)" class="form-control" name="id_filiere"
                                    id="filiere">
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="filiere" class="control-label">Anneé Univir</label>
                                <select onchange="changeInput(this)" class="form-control" name="id_annee" id="filiere">
                                    <option value="-1" selected disabled>selelct Annee</option>

                                    <?php  $_smarty_tpl->tpl_vars['annee'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['annee']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['anneesUnivs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['annee']->key => $_smarty_tpl->tpl_vars['annee']->value) {
$_smarty_tpl->tpl_vars['annee']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['annee']->value['id_annee'];?>
"><?php echo $_smarty_tpl->tpl_vars['annee']->value['annee'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nom">Date:</label>
                                <input onchange="changeInput(this)" type="date" name="date" id="nom"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Heure Debut</label>
                                <input onchange="changeInput(this)" type="text" name="HeureD" id="password"
                                    placeholder="08:00" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Heure Fin</label>
                                <input onchange="changeInput(this)" type="text" name="HeureF" id="password"
                                    placeholder="10:00" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider mt-lg-3"></div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Surviant</label>
                                <select onchange="profSelected(this)" class="form-control" name="filiere" id="filiere">
                                    <option value="-1" selected disabled>selelct Professeur</option>
                                    <?php  $_smarty_tpl->tpl_vars['pro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['professeurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pro']->key => $_smarty_tpl->tpl_vars['pro']->value) {
$_smarty_tpl->tpl_vars['pro']->_loop = true;
?>

                                    <option value="#<?php echo $_smarty_tpl->tpl_vars['pro']->value['id_prof'];?>
- <?php echo $_smarty_tpl->tpl_vars['pro']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['pro']->value['prenom'];?>
"><?php echo $_smarty_tpl->tpl_vars['pro']->value['nom'];?>

                                        <?php echo $_smarty_tpl->tpl_vars['pro']->value['prenom'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Professuer</th>
                                        <th scope="col">Local</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="ProfTableBody" class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group text-center mt-2">
                        <input onclick="sendData()" class="btn btn-info " name="submit" value="Ajouter" />
                        <input type="reset" class="btn btn-light" name="annuler" value="Annuller">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
