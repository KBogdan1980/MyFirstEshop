<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-08-23 16:32:30
         compiled from "..\views\admin\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2645599d81b68df074-24297000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9fe0ef83a480635aaa8edb1f87486ca16e36c9f' => 
    array (
      0 => '..\\views\\admin\\admin.tpl',
      1 => 1503498748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2645599d81b68df074-24297000',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_599d81b68dfdd0_40839655',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599d81b68dfdd0_40839655')) {function content_599d81b68dfdd0_40839655($_smarty_tpl) {?><div id="blockNewCategory">
    Нова категорія: 
    <input name="newCategoryName" id="newCategoryName" type="text" value="">
    <br><br>
        Є підкатегорією для
        <select name="generalCatId">
            <option value="0">Головна категорія
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                <?php } ?>
        </select>
        <br><br>
        <input type="button" onclick="newCategory();" value="Додати категорію">
        
</div><?php }} ?>
