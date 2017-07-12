<?php /* Smarty version Smarty-3.1.22-dev, created on 2017-07-05 14:53:42
         compiled from "..\views\default\leftcolumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4782593a9089a07745-21210814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '729145b4f4f2e6a7b3f096fbd4fa779733b42ec2' => 
    array (
      0 => '..\\views\\default\\leftcolumn.tpl',
      1 => 1499259215,
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
    'cartCntItems' => 0,
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
            
            <div id="userBox" class="hideme">
                <a href="#" id="userLink"></a><br>
                <a href="/user/logout/" onclick="logout();">Вихід</a>
            </div> 
            
            <div id="loginBox">
                <div class="menuCaption">Авторизація</div>
                <input type="text" name="loginEmail" id="loginEmail" value=""><br>
                <input type="password" name="loginPwd" id="loginPwd" value=""><br>
                <input type="button" onclick="login();" value="Ввійти">
            </div>
            
            
            <div id="registerBox">
                <div class="menuCaption showHidden" onclick="showRegisterBox()">Реєстрація</div>
                <div id="registerBoxHidden">
                    email:<br>
                    <input type="text" id="email" name="email" value=""><br>
                    пароль:<br>
                    <input type="password" id="pwd1" name="pwd1" value=""><br>
                    повторти пароль:
                    <input type="password" id="pwd2" name="pwd2" value=""><br>
                    <input type="button" onclick="registerNewUser();" value="Зареєструватись"><br>
                </div>
                
            </div>
            
            
            
            
            <div class="menuCaption">Кошик</div>
            <a href="/cart/" title="Перейти в кошик">В кошику</a>
            <span id="cartCntItems">
                <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value>0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php } else { ?> пусто <?php }?> 
            </span>
            
        </div><?php }} ?>
