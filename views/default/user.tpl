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