<?php

include_once '../config/config.php'; // ініціалізація налаштувань
include_once '../library/mainFunctions.php';

//визначаємо з яким параметром будемо працювати
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
        
//визначаємо яка функція з данного контроллера буде викликатись і формувати сторінку
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


loadPage($controllerName, $actionName);



