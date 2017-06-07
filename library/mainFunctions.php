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