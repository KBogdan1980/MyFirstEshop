<?php

session_start(); //стартуємо сесію

//якщо в сесії немає масива кошика, створюємо його
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

include_once '../config/config.php'; // ініціалізація налаштувань
include_once '../config/db.php';  //Ініціалізація бази данних
include_once '../library/mainFunctions.php'; // основні функції

//визначаємо з яким параметром будемо працювати
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
  
//визначаємо яка функція з данного контроллера буде викликатись і формувати сторінку
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

//якщо в сесії є дані про авторизованого користувача, передаємо їх в шаблон
if(isset($_SESSION['user'])){
    $smarty->assign('arUser', $_SESSION['user']);
}


//ініціалізуємо змінну шаблонізатора кількості елементів в корзині
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);



