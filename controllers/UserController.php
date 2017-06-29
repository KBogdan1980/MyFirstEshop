<?php

/**
 *Контроллер функцій користувача
 *   
 */

/**
 * підключаємо моделі
 */
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';


/**
 * AJAX реєстрація користувача
 * Ініціалізація сесійної змінної ($_SESSION['user'])
 * 
 * @return json масив даних нового користувача
 */
function registerAction(){
    
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
    
    //перевіряємо чи є вже зареєстрований користувач
    if (! $resData && checkUserEmail($email)){
        $resData['success'] = false;
        $resData['message'] = "Користувач з таким email ('{$email}') вже зареєстрований";
    }
    
    if (! $resData) {
        $pwdMD5 = md5($pwd1);
        
        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);
    }
}