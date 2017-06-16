<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-06-16 15:32:00
         compiled from "..\views\default\leftcolumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4782593a9089a07745-21210814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '729145b4f4f2e6a7b3f096fbd4fa779733b42ec2' => 
    array (
      0 => '..\\views\\default\\leftcolumn.tpl',
      1 => 1497618742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4782593a9089a07745-21210814',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_593a9089a09b36_49870514',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593a9089a09b36_49870514')) {function content_593a9089a09b36_49870514($_smarty_tpl) {?> 
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Меню: </div>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                         <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br>
                         
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                                   <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
?>
                                   --<a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br>

                                   <?php } ?>
                            <?php }?>                         
                         
                     <?php } ?>   
            </div>   
        </div><?php }} ?>
