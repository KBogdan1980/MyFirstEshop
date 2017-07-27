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
    
    /**
     * Формування сторінки заказа
     * 
     */
    function orderAction($smarty){
        //отримуємо масив ідентифікаторів (ID)  продуктів кошика
        $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        //якщо кошик порожній, редиректимо в кошик
        if(! isset($itemsIds)){
            redirect('/cart/');
            return;
        }
        
       //отримуємо з масиву $_POST кількість товарів, які купуються
        $itemsCnt = array();
        foreach ($itemsIds as $item){
            //формуємо ключ для масиву $_POST
            $postVar = 'itemCnt_' . $item;
            //створюємо елемент масива кількості товару, який купується
            // Ключ масива - ID-товару, значення масива - кількість товару
            // $itemsCnt[1]= 3; товар з ID ==1 купують 3 шт.
            $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
        }
        
        //отримуємо список продуктів по масиву з корзини
        $rsProducts = getProductsFromArray($itemsIds);
        // додаємо кожному продукту додаткове поле
        // "realPrice = кількість продуктів * на ціну продукта"
        // "cnt" - кількість товару, що купується
        
        // &$item- для того, щоб при зміні змінної $item змінювався і елемент масиву $rsProducts
        $i = 0;
        foreach ($rsProducts as &$item){
            $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
            if($item['cnt']) {
                $item['realPrice'] = $item['cnt'] * $item['price'];
            } else {
                //якщо виявилось, що товар в кошику є, але його кількість == 0, видаляємо цей товар
                unset($rsProducts[$i]);
            }
            $i++;
        }
        
        if (! $rsProducts){
            echo 'Кошик порожній';
            return;
        }
        
        //отриманий масив товарів, які купуються заносимо в сесійну змінну
        $_SESSION['saleCart'] = $rsProducts;
        
        $rsCategories = getAllMainCatsWithChildren();
        
        // hideLoginBox змінна-флажок для того, щоб сховати блоки логіна і 
        // реєстрації в боковій панелі
        
        if(!isset($_SESSION['user'])){
            $smarty->assign('hideLoginBox', 1);
        }
        
        $smarty->assign('PageTitle', 'Замовлення');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        
        loadTemplate($smarty, 'header');
        loadTemplate($smarty, 'order');
        loadTemplate($smarty, 'footer');
    }