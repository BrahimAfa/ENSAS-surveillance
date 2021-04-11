<?php /* Smarty version Smarty-3.1.16, created on 2021-04-10 22:11:30
         compiled from "../View/templates/surviance2.html" */ ?>
<?php /*%%SmartyHeaderCode:20131141856071fc2200b252-92010344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4c7adddc7daae74bbe727cc09075d9a29cb9851' => 
    array (
      0 => '../View/templates/surviance2.html',
      1 => 1618090332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20131141856071fc2200b252-92010344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_6071fc22058575_02664781',
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
<?php if ($_valid && !is_callable('content_6071fc22058575_02664781')) {function content_6071fc22058575_02664781($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        var data = <?php echo json_encode($_smarty_tpl->tpl_vars['locals']->value);?>

    </script>
    <link rel="stylesheet" href="../View/templates/styles/loading.css">

    <script src="../View/templates/scripts/surviance.js"></script>
</head>

<body>
    <!-- <?php echo $_smarty_tpl->getSubTemplate ("./login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 -->
    <div class="container">
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
                        <input onclick="sendData()" class="btn btn-success" name="submit" value="Ajouter" />
                        <input type="reset" class="btn btn-light" name="annuler" value="Annuller">
                    </div>
                </form>
            </div>



        </div>
    </div>
    <div class="overlay"></div>
    <div class="spanner">
        <div class="loader"></div>
        <p>data is being processed...</p>
    </div>
</body>

</html>
<?php }} ?>
