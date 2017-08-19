<?php

/**
 * Модель для таблиці замовлень (orders)
 */

/**
 * Створення замовлення (без прив"язки товару)
 * 
 * @param string $name
 * @param string $phone
 * @param string $adress
 * @return integer - ID створеного заказу
 */
function makeNewOrder($name, $phone, $adress){
   //ініціалізація змінних
    $userId = $_SESSION['user']['id'];
    $comment = "id користувача: {$userId}<br> Ім\'я: {$name}<br>  Тел: {$phone}<br> Адрес: {$adress} ";
    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];
    
     //формування запиту до бази даних
    $sql = "INSERT INTO orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)"
            . "VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";
            
     $rs = mysql_query($sql);
     
    //отримати id створеного замовлення
    if($rs){
        $sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        $rs = mysql_query($sql);
        //перетворення результатів запиту
        $rs = createSmartyRsArray($rs);
        
        //повертаємо id створеного запиту
        if(isset($rs[0])){
            return $rs[0]['id'];
        }
    }
    return false;
}

/**
 * Отримати список заказів з прив"язкою до продуктів для користувача $userId
 * 
 * 
 * @param integer $userId - ID користувача
 * @return array - масив заказів з прив"язкою до продуктів
 */
function getOrdersWithProductsByUser($userId){
    
    $userId = intval($userId);
    $sql = "SELECT * FROM orders WHERE `user_id` = '{$userId}' ORDER BY id DESC";
    
    $rs = mysql_query($sql);
    
    $smartyRs = array();
    while ($row = mysql_fetch_assoc($rs)){
        $rsChildren = getPurchaseForOrder($row['id']);
        
        if($rsChildren){
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}