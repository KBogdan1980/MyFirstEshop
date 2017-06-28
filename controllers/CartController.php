<?php

/**
 * cartcontroller.php
 * 
 * Контроллер для роботи з кошиком (/cart/)
 * 
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


/**
 * Добавити товар в кошик
 * 
 * @param integer id GET-параметр - ID продукта, що добавляється
 * @return json інформація про операцію (успішно, кількість елементів в кошику)
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null; 
    if (! $itemId)  return false;
    
    $resData = array();
    
    //якщо значення не знайдено, то додаємо
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
        } else {
            $resData['success'] = 0;
        }
        echo json_encode($resData);     
    }
    
    /**
     * Видалення товару з кошика
     * 
     * @param integer id GET параметр - ID товару, що видаляється з кошика
     * @return json інформація про операцію (успішно, кількість елементів в кошику)
     */
    function removefromcartAction(){
        $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (! $itemId) exit();
        
        $resData = array();
        $key = array_search($itemId, $_SESSION['cart']);
        if ($key !== false){
            unset($_SESSION['cart'][$key]);
            $resData['success'] = 1;
            $resData['cntItems'] = count($_SESSION['cart']);
        } else {
            $resData['success'] = 0;
        }
        echo json_encode($resData);
    }
    
    /**
     * Формування сторінки кошика
     * 
     * @link /cart/
     */
    function indexAction($smarty){
        $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        
        $rsCategories = getAllMainCatsWithChildren();
        $rsProducts = getProductsFromArray($itemIds);
        
        $smarty->assign('pageTitle', 'Кошик');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        
        loadTemplate($smarty, 'header');
        loadTemplate($smarty, 'cart');
        loadTemplate($smarty, 'footer');
    }