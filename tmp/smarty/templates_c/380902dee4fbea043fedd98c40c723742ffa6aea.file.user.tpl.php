<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-07-14 20:35:46
         compiled from "..\views\default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1082959690e9ff052a6-32301316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '380902dee4fbea043fedd98c40c723742ffa6aea' => 
    array (
      0 => '..\\views\\default\\user.tpl',
      1 => 1500057340,
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
        <td>&nbsp</td>
        <td><input type="button" value="Зберегти зміни" onclick="updateUserData()";></td>
    </tr>
</table><?php }} ?>
