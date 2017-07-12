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
        if ($userData['success']){
            $resData['message'] = 'Користувач успішно зареєстрований';
            $resData['success'] = 1;
            
            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Помилка реєстрації';
        }
        
    }
    echo json_encode($resData);
}

/**
 * Функція виходу з акаунта
 * 
 */
function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    
    redirect('/');
}

/**
 * AJAX авторизація користувача
 * 
 * @return json массив даних користувача
 */
function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);
    
    $userData = loginUser($email, $pwd);
    
    if ($userData['success']){
        $userData = $userData[0];
        
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        
        $resData = $_SESSION['user'];
        $resData['success'] = 1;
        
        //$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        //$resData['userEmail'] = $email;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неправильний логін або пароль';
    }
    echo json_encode($resData); 
}