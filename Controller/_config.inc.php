<?php
date_default_timezone_set('UTC');
define('SMARTY_DIR', '../outils/Smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$tpl = new Smarty();
$tpl->debugging = 0;
$tpl->template_dir = '../View/templates/';
$tpl->compile_dir = '../View/templates_c/';
$tpl->config_dir = '../View/configs/';
$tpl->cache_dir = '../View/cache/';
$tpl->left_delimiter = '{';
$tpl->right_delimiter = '}';
// Settings
ini_set('error_reporting', E_ALL^E_NOTICE);
ini_set('display_errors', 'off');
