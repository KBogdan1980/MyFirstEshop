<?php

/**
 * Контроллер головної сторінки
 * 
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';

include_once '../models/ProductsModel.php';

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
    $rsProducts = getLastProducts(16);
        
    $smarty->assign('pageTitle', 'Головна сторінка сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}