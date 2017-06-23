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
