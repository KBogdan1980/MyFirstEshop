<?php

/**
 * Модель для таблиці продукції
 * 
 */

/**
 * Отримуємо останні добавлені товари
 * 
 * @param integer $limit - ліміт товарів
 * @return array масив товарів
 */
function getLastProducts($limit = 0){
    $sql = "SELECT * FROM `products` ORDER BY id DESC";
    if ($limit){
        $sql .= " LIMIT {$limit}"; 
    }
    
    $rs = mysql_query($sql);
    return createSmartyRsArray($rs);
}