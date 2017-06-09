<?php

/**
 * Контроллер головної сторінки
 * 
 */
function testAction (){
    echo 'IndexController.php > testAction';
} 

/**
 * Формування головної сторінки сайта
 * 
 * @param obhject $smarty шаблонізатор
 */

function indexAction($smarty){
        
    $smarty->assign('pageTitle', 'Головна сторінка сайта');
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}