{*Ліва колонка*} 
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Меню: </div>
                    {foreach $rsCategories as $item}
                         <a href="/?controller=category&id={$item['id']}">{$item['name']}</a><br>
                         
                            {if isset($item['children'])}
                                   {foreach $item['children'] as $itemChild}
                                   --<a href="/?controller=category&id={$itemChild['id']}">{$itemChild['name']}</a><br>

                                   {/foreach}
                            {/if}                         
                         
                     {/foreach}   
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
                {if $cartCntItems > 0} {$cartCntItems} {else} пусто {/if} 
            </span>
            
        </div>