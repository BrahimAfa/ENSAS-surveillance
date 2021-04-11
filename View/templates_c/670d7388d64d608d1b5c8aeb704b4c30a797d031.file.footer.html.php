<?php /* Smarty version Smarty-3.1.16, created on 2021-04-10 23:19:36
         compiled from "/var/www/html/SAMATI_PREPA/View/templates/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:5072260496071fa6e811b45-31809137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '670d7388d64d608d1b5c8aeb704b4c30a797d031' => 
    array (
      0 => '/var/www/html/SAMATI_PREPA/View/templates/footer.html',
      1 => 1618096764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5072260496071fa6e811b45-31809137',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_6071fa6e8129c2_77763609',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6071fa6e8129c2_77763609')) {function content_6071fa6e8129c2_77763609($_smarty_tpl) {?>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
<?php }} ?>
