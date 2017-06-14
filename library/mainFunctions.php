<?php

/**
 * 
 * Основні функції
 * 
 */

/**
 * Формування сторінки запиту
 * 
 * @param string $controllerName назва контроллера
 * @param string $actionName назва функції обробки сторінки
 */

function loadPage($smarty, $controllerName, $actionName = 'index'){
    include_once PathPrefix . $controllerName . PathPostfix;
    
    $function = $actionName . 'Action';
    $function($smarty);
}

/**
 * Завантаження шаблона
 * 
 * @param object $smarty //об'єкт шаблонізатора
 * @param string $templateName // назва файла шаблона
 */
function loadTemplate($smarty, $templateName)
    {
    $smarty->display($templateName . TemplatePostfix);
}

/**
 * Функція відладки. Зупиняє роботу програми, виводячи значення $value
 * 
 * @param variant $value  змінна для виводу її на сторінку
 */

function d($value = null, $die = 1){
    echo 'Debug: <br><pre>';
    print_r($value);
    echo '</pre>';
    
    if ($die) die;
 }
 
 /**
  * Перетворення результату роботи функції виборки в асоціативний масив
  * 
  * @param recordset $rs набір строк - результат роботи SELECT
  * @return array
  */
 function createSmartyRsArray($rs){
     if (! $rs) return false;
     
     $smartyRs = array();
     while ($row = mysql_fetch_assoc($rs)) {
         $smartyRs[] = $row;
     }
     
     return $smartyRs;
 }