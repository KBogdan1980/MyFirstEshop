<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-06-09 14:11:53
         compiled from "..\views\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16169593a90892bcd49-40774453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce7207c4d3821e3d87a6e9ab389f37a7325c133a' => 
    array (
      0 => '..\\views\\default\\header.tpl',
      1 => 1497010296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16169593a90892bcd49-40774453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_593a908983ae64_58965382',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593a908983ae64_58965382')) {function content_593a908983ae64_58965382($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css"/>
    </head>
    <body>
        <div id="header">
            <h1> My shop -  Мій інтернет магазин </h1>
        </div>
        
        
        <?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
           
        <div id="centerColumn">
            centerColumn<?php }} ?>
