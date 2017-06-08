<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-06-08 15:55:09
         compiled from "..\views\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15555593807df5ae7a1-00318016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78aa7c798a9157cb75a704e697145fd18ab21a6d' => 
    array (
      0 => '..\\views\\default\\index.tpl',
      1 => 1496930108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15555593807df5ae7a1-00318016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_593807df655488_68734578',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593807df655488_68734578')) {function content_593807df655488_68734578($_smarty_tpl) {?><html>
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
        
         
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Меню: </div>
                    Пункт 1 <br>
                    Пункт 2 <br>
                    Пункт 3 <br>
            </div>   
        </div>
        
        
        <div id="centerColumn">
            centerColumn
        </div>
        
        <div id="footet">
            Footer
            
        </div>
        
    </body>
</html><?php }} ?>
