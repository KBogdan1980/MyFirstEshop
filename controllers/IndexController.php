<?php

/**
 * Контроллер головної сторінки
 * 
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';

function testAction (){
    echo 'IndexController.php > testAction';
} 

/**
 * Формування головної сторінки сайта
 * 
 * @param obhject $smarty шаблонізатор
 */
function indexAction($smarty){

    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle', 'Головна сторінка сайта');
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}