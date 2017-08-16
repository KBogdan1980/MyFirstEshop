{*Сторінка користувача*}

<h1>Ваші реєстраційні дані</h1>
<table border="0">
    <tr>
        <td>Логін (email)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Ім'я</td>
        <td><input type="text" id="newName" value="{$arUser['name']}"></td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><input type="text" id="newPhone" value="{$arUser['phone']}"></td>
    </tr>
    <tr>
        <td>Адреса</td>
        <td><textarea id="newAdress">{$arUser['adress']}</textarea></td>
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
{if ! $rsUserOrders}
    Немає заказів
    {else}
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
            {foreach $rsUserOrders as $item name=orders}
                   <tr>
                       <td>{$smarty.foreach.orders.iteration}</td>
                       <td><a href="#" onclick="showProducts('{$item['id']}'); return false;">Показати номер заказу</td>
                       <td>{$item['id']}</td>
                       <td>{$item['status']}</td>
                       <td>{$item['date_created']}</td>
                       <td>{$item['date_payment']}&nbsp;</td>
                       <td>{$item['comment']}</td>
                   </tr>    
             {/foreach}
        </table>
 {/if}