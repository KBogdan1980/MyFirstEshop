<?php

/**
 * Модель для таблиці користувачів (users)
 *  
 */

/**
 * Реєстрація нового користувача
 * 
 * @param string $email пошта
 * @param string $pwdMD5 пароль, зашифрований в MD5
 * @param string $name ім'я користувача
 * @param string $phone телефон
 * @param string $adress адреса користувача
 * @return array масив данних нового користувача
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $adress){
    
    $email = htmlspecialchars(mysql_real_escape_string($email));
    $name = htmlspecialchars(mysql_real_escape_string($name));
    $phone = htmlspecialchars(mysql_real_escape_string($phone));
    $adress = htmlspecialchars(mysql_real_escape_string($adress));
    
    $sql = "INSERT INTO users (`email`, `pwd`, `name`, `phone`, `adress`)"
            . "VALUES('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";
            
            $rs = mysql_query($sql);

            if ($rs){
                $sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}') LIMIT 1";
                
                $rs = mysql_query($sql);
                $rs = createSmartyRsArray($rs);
                
                if (isset($rs[0])){
                    $rs['success'] = 1;
                  } else {
                      $rs['success'] = 0;
                  }
            } else {
                $rs['success'] = 0;
            }
            return $rs;
 }

 /**
  * Перевірка параметрів для реєстрації користувача
  * 
  * @param string $email email
  * @param string $pwd1 пароль
  * @param string $pwd2 повторення пароля
  * @return array результат
  */
 function checkRegisterParams($email, $pwd1, $pwd2){
     $res = null;
     
     if (! $email){
         $res['success'] = false;
         $res['message'] = 'Введіть Ваш email';
     }
     
     if (! $pwd1){
         $res['success'] = false;
         $res['message'] = 'Введіть Ваш пароль';
     }
     
     if (! $pwd2){
         $res['success'] = false;
         $res['message'] = 'Повторно введіть Ваш пароль';
     }
     
     if ($pwd1 != $pwd2){
         $res['success'] = false;
         $res['message'] = 'Введені Вами паролі не співпадають';
     }
     
     return $res;
 }
 
 /**
  * Перевірка email (чи є email-адреса в БД)
  * 
  * @param string $email
  * @return array масив - строка з таблиці users або пустий масив
  */
 function checkUserEmail($email){
     
     $email = mysql_real_escape_string($email);
     $sql = "SELECT id FROM users WHERE email = '{$email}'";
     
     $rs = mysql_query($sql);
     $rs = createSmartyRsArray($rs);
     
     return $rs;
 }
 /**
  * Авторизація користувача
  * 
  * @param string $email пошта (логін)
  * @param string $pwd пароль
  * @return array масив даних користувача
  */
 function loginUser($email, $pwd){
    $email = htmlspecialchars(mysql_real_escape_string($email));
    $pwd = md5($pwd);
    
    $sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pwd` = '{$pwd}') LIMIT 1";
    $rs = mysql_query($sql);
    
    $rs = createSmartyRsArray($rs);
    if (isset($rs[0])){
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }
    return $rs;
 }
 
 /**
  * Зміна даних користувача
  * 
  * @param string $name  ім"я корисувача
  * @param string $phone телефон
  * @param string $adress адреса
  * @param string $pwd1 новий пароль
  * @param string $pwd2 повтор нового пароля
  * @param string $curPwd поточний пароль
  * @return boolean TRUE у випадку успіху
  */
 function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd){
     
     $email = htmlspecialchars(mysql_real_escape_string($_SESSION['user']['email']));
     $name = htmlspecialchars(mysql_real_escape_string($name));
     $phone = htmlspecialchars(mysql_real_escape_string($phone));
     $adress = htmlspecialchars(mysql_real_escape_string($adress));
     $pwd1 = trim($pwd1);
     $pwd2 = trim($pwd2);
     
     $newPwd = null;
     if ($pwd && ($pwd == $pwd2) ){
         $newPwd = md5($pwd);
     }
     
     $sql = "UPDATE users SET";
     
     if ($newPwd){
         $sql .= "`pwd` = '{$newPwd}', ";
     }
     
     $sql .= " `name` = '{$name}', `phone` = '{$phone}', `adress` = '{$adress}'"
     . " WHERE `email` = '{$email}' AND `pwd` = '{$curPwd}' LIMIT 1 ";
     
     $rs = mysql_query($sql);
     
     return $rs;
     
     
 }