<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-08-19 12:58:12
         compiled from "..\views\default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1082959690e9ff052a6-32301316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '380902dee4fbea043fedd98c40c723742ffa6aea' => 
    array (
      0 => '..\\views\\default\\user.tpl',
      1 => 1503140289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1082959690e9ff052a6-32301316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.22-dev',
  'unifunc' => 'content_59690ea079b0d2_88706194',
  'variables' => 
  array (
    'arUser' => 0,
    'rsUserOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59690ea079b0d2_88706194')) {function content_59690ea079b0d2_88706194($_smarty_tpl) {?>

<h1>Ваші реєстраційні дані</h1>
<table border="0">
    <tr>
        <td>Логін (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Ім'я</td>
        <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
    </tr>
    <tr>
        <td>Адреса</td>
        <td><textarea id="newAdress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Новий пароль</td>
        <td><input type="password" id="newPwd1" value=""></td>
    </tr>
    <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" value=""></td>
    </tr>
    <tr>
        <td>Для того, щоб зберегти дані, введіть поточний пароль</td>
        <td><input type="password" id="curPwd" value=""></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="Зберегти зміни" onclick="updateUserData();"></td>
    </tr>
</table>
    
    <h2>Закази:</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
    Немає заказів
    <?php } else { ?>
        <table border="1" cellpadding="1" cellspacing="1">
            <tr>
                <th>№</th>
                <th>Дія</th>
                <th>ID заказа</th>
                <th>Статус</th>
                <th>Дата створення</th>
                <th>Дата оплати</th>
                <th>Додаткова інформація</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
                   <tr>
                       <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>
                       <td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Показати список товарів заказу</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
                   </tr>    
                   <tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                       <td colspan="7">
                           <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                               <table border="1" cellpadding="1" cellspacing="1" width="100%">
                                   <tr>
                                       <th>№</th>
                                       <th>ID</th>
                                       <th>Назва</th>
                                       <th>Ціна</th>
                                       <th>Кількість</th>
                                   </tr>   
                                   <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
                                       <tr>
                                           <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
                                           <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                       </tr>   
                                   <?php } ?>    
                               </table>   
                           <?php }?>   
                       </td>    
                       
                   </tr>
             <?php } ?>
        </table>
 <?php }?><?php }} ?>
