<?php

/**
 * Модель для таблиці продукції (purchase)
 * 
 */


/**
 * Внесення в БД даних продукції з прив"язкою до заказу
 * 
 * @param integer $orderId ID Замовлення
 * @param array $cart  масив кошика
 * @return boolean TRUE в випадку успішного добавлення в БД
 */
function setPurchaseForOrder($orderId, $cart){
    
    $sql = "INSERT INTO purchase (order_id, product_id, price, amount) VALUES ";
    $values = array();
    //формуємо масив строк для запиту для кожного товару
    foreach ($cart as $item){
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }
    
    //перетворюємо масив на строку
    $sql .= implode($values, ', ');
    $rs = mysql_query($sql);
    return $rs;
}

function getPurchaseForOrder($orderId){
    $sql = "SELECT `pe`.*, `ps`.`name` FROM purchase as `pe` JOIN products as `ps` ON `pe`.product_id = `ps`.id WHERE `pe`.order_id = {$orderId}";
   
    //d($sql);
    $rs = mysql_query($sql);
    return createSmartyRsArray($rs);
}