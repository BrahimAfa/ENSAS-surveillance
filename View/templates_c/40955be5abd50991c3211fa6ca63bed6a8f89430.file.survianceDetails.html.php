<?php /* Smarty version Smarty-3.1.16, created on 2021-04-11 17:12:21
         compiled from "../View/templates/survianceDetails.html" */ ?>
<?php /*%%SmartyHeaderCode:18615397006072248f3ee0e4-81854026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40955be5abd50991c3211fa6ca63bed6a8f89430' => 
    array (
      0 => '../View/templates/survianceDetails.html',
      1 => 1618161141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18615397006072248f3ee0e4-81854026',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_6072248f42a357_67357654',
  'variables' => 
  array (
    'SurvianceDetails' => 0,
    'detail' => 0,
    'survProf' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6072248f42a357_67357654')) {function content_6072248f42a357_67357654($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="../View/templates/scripts/survianceDatils.js"></script>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php echo $_smarty_tpl->getSubTemplate ("./sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!-- Page Content Holder -->

    <div id="content">
        <?php echo $_smarty_tpl->getSubTemplate ("./navbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="mb-4 card" style="width: 100%;">
          <h5 class="card-header">Filter</h5>
                <form action="./PDF.php" method="POST">
            <div class="d-flex justify-content-between">
                <div class="d-flex form-gr
                oup w-25 m-3">
                    <input id="prof"style="background: rgba(0, 0, 0, 0.05);" type="text" name="prof" placeholder="Professeur"
                        class="form-control">
                </div>
                <input class="m-3 d-flex btn btn-info" type="submit"  name="submit" value="Export Surviance" />
            </div>
            </form>


        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Module</th>
                        <th>Filière</th>
                        <th>Date</th>
                        <th>Exam</th>
                        <th>show</th>

                    </tr>
                </thead>
                <tbody id="dataEtudBody">
<!-- 'id_annee' 'id_module' 'date' 'HeureD' 'HeureF' 'Exam' 'filiere' 'module' -->
                    <?php  $_smarty_tpl->tpl_vars['detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['detail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SurvianceDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['detail']->key => $_smarty_tpl->tpl_vars['detail']->value) {
$_smarty_tpl->tpl_vars['detail']->_loop = true;
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['detail']->value['module'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['detail']->value['filiere'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['detail']->value['date'];?>
 From: <?php echo $_smarty_tpl->tpl_vars['detail']->value['HeureD'];?>
 ~ To: <?php echo $_smarty_tpl->tpl_vars['detail']->value['HeureF'];?>
</td>
                        <td> <?php echo $_smarty_tpl->tpl_vars['detail']->value['Exam'];?>
</td>
                        <td style="cursor: pointer; text-align: center;">
                            <button class="button trigger">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>
                        </td>

                    </tr>
                    <tr class="button--disapear">
                        <td colspan="5">
                            <table class="w-100" style="border: 20px solid #e4e4e4">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Local</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['survProf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['survProf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['detail']->value['profs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['survProf']->key => $_smarty_tpl->tpl_vars['survProf']->value) {
$_smarty_tpl->tpl_vars['survProf']->_loop = true;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['survProf']->value['nom'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['survProf']->value['prenom'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['survProf']->value['email'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['survProf']->value['local'];?>
</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#prof').on('input',WaitAndSendSearchRequest);
        setOniputEvent();

    </script>
    <?php echo $_smarty_tpl->getSubTemplate ("./footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
