<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-06-20 16:11:44
         compiled from "..\views\default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1814659492d20d39c23-10827105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e36d542c2a768d1d8fc7927bc02ae75d63d9fe3b' => 
    array (
      0 => '..\\views\\default\\product.tpl',
      1 => 1497964456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1814659492d20d39c23-10827105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsProduct' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_59492d212dbba0_85486545',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59492d212dbba0_85486545')) {function content_59492d212dbba0_85486545($_smarty_tpl) {?>
<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img width="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
Вартість: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a href="#" alt="Додати в корзину">Додати в корзину</a>
<p>Опис <br> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }} ?>
