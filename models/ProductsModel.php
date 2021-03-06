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
function getLastProducts($limit = null){
    $sql = "SELECT * FROM `products` ORDER BY id DESC";
    if ($limit){
        $sql .= " LIMIT {$limit}"; 
    }
    
    $rs = mysql_query($sql);
    return createSmartyRsArray($rs);
}
/**
 * Отримати продукти для категорії $itemId
 * 
 * @param integer $itemId ID категорії
 * @return array масив продуктів
 */
function getProductsByCat($itemId){
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
    
    $rs = mysql_query($sql);
    return createSmartyRsArray($rs);
}
/**
 * Отримати дані продукта по ID
 * 
 * @param integer $itemId - ID продукта
 * @return array - масив даних продукта
 */
function getProductById($itemId){
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE id = '{$itemId}'";
    
    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
}
/**
 * отримати список продуктів з масива ідентифікаторів (ID's)
 * 
 * @param type $itemIds масив ідентифікаторів продуктів
 * @return array масив даних продуктів
 */
function getProductsFromArray($itemIds){
    $strIds = implode($itemIds, ', ');
    $sql = "SELECT * FROM products WHERE id in ({$strIds})";
    
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}