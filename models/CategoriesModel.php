<?php

/**
 * Модель для таблиці категорій (categories)
 * 
 */



/**
 * Отримати дочірні категорії для категорії $catId
 * 
 * @param integer $catId - ID категорії
 * @return array - масив дочірніх категорій
 */

function getChildrenForCat($catId){
    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";
    
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}


/**
 * Отримання головних категорій з прив'язкою до дочірніх
 * 
 * @return array масив категорій
 */
function getAllMainCatsWithChildren(){
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';

    $rs = mysql_query($sql);
    
    $smartyRs = array();
    
    while ($row = mysql_fetch_assoc($rs)) {
        
        $rsChildren = getChildrenForCat($row['id']);
        
        if ($rsChildren){
            $row['children'] = $rsChildren;
        }
        
        $smartyRs[] = $row;
    }
    
    return $smartyRs;
}        
/**
 * Отримати дані категорії по ID
 * 
 * @param integer $catId ID категорії
 * @return array массив - срока категорії
 */
function getCatById($catId){
    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";
    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
    
}
/**
 * Отримання всіх головних категорій (категорій, що не є дочірніми)
 * 
 * @return array масив категорій
 */
function getAllMainCategories(){
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';
    $rs = mysql_query($sql);
    return createSmartyRsArray($rs);
}