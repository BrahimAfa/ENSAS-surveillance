<?php /* Smarty version Smarty-3.1.16, created on 2021-04-11 02:55:42
         compiled from "/var/www/html/SAMATI_PREPA/View/templates/sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:3089335506071fbde2fc909-38308938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31a609437ce072546a8ba5e301bdc59b18e0bf74' => 
    array (
      0 => '/var/www/html/SAMATI_PREPA/View/templates/sidebar.html',
      1 => 1618109740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3089335506071fbde2fc909-38308938',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_6071fbde2fd181_85976610',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6071fbde2fd181_85976610')) {function content_6071fbde2fd181_85976610($_smarty_tpl) {?><nav id="sidebar">
    <div class="sidebar-header text-center">
        <h3>ENSAS Surviance</h3>
    </div>

    <ul class="list-unstyled components">
        <p class="text-center">Navigation</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Surviance</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">

                <li>
                    <a href="surviance.php">New</a>
                </li>
                <li>
                    <a href="survianceDetail.php">Details</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="Module.php">Modules</a>
        </li>
        <li>
            <a href="Prof.php">Professeurs</a>
        </li>
        <li>
            <a href="Filiere.php">Filiéres</a>
        </li>
          <li>
            <a href="Local.php">Locals</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://github.com" class="download">Githu Repository</a>
        </li>
        <li>
            <a href="#" class="article">Do something</a>
        </li>
    </ul>
</nav>
<?php }} ?>
