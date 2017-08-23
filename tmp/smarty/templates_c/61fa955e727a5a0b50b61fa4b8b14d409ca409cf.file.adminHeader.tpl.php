<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-08-23 15:23:02
         compiled from "..\views\admin\adminHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21567599d81b60dc7e0-89210011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61fa955e727a5a0b50b61fa4b8b14d409ca409cf' => 
    array (
      0 => '..\\views\\admin\\adminHeader.tpl',
      1 => 1503494388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21567599d81b60dc7e0-89210011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'teplateWebPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_599d81b66744b4_95980525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599d81b66744b4_95980525')) {function content_599d81b66744b4_95980525($_smarty_tpl) {?>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
/css/main.css" type="text/css">
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" srs="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="header">
            <h1>Управління сайтом</h1>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ('adminLeftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div id="centerColumn"><?php }} ?>
