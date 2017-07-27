<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-07-26 09:58:42
         compiled from "..\views\default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13758595399d3446868-84173174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93fb4036cea9b7abafd8dda4237deb09cc11223a' => 
    array (
      0 => '..\\views\\default\\cart.tpl',
      1 => 1501055741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13758595399d3446868-84173174',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_595399d347f108_96918877',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595399d347f108_96918877')) {function content_595399d347f108_96918877($_smarty_tpl) {?>

<h1>Кошик</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
В кошику пусто.

<?php } else { ?>
  <form action="/cart/order/" method="POST">
    <h2>Данні замовлення</h2>
    <table>
        <tr>
            <td>№</td>
            <td>Назва</td>
            <td>Кількість</td>
            <td>Ціна за одиницю</td>
            <td>Ціна</td>
            <td>Дія</td>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
            <tr>
                
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
                
                <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br></td>
                
                <td><input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/></td>
                    
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                
                <td>
                    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Видалити з кошика">Видалити з кошика</a>
                    <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class='hideme' href='#' onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Відновити">Відновити</a>
                </td>
        </tr>
        <?php } ?>
        
    </table>
        
        <input type="submit" value="Оформити заказ">      
  </form>
<?php }?><?php }} ?>
