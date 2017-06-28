 /**
  * Функція додавання товара в кошик
  * 
  * @param integer itemID  ID продукта
  * @return якщо успішно, то обновляються данні кошика на сторінці
  */
 
 function addToCart(itemId){
     console.log("js - addToCart()");
     $.ajax({
         type: 'POST',
         //async: true,
         url: "/cart/addtocart/" + itemId + '/',
         dataType: 'json',
         success: function(data){
             if (data['success']) {
                 $('#cartCntItems').html(data['cntItems']);
                 
                 $('#addCart_' + itemId).hide();
                 $('#removeCart_' + itemId).show();
             }
         }
     });
 }
 
 /**
  * Видалення товару з кошика
  * 
  * @param integer itemId ID продукта
  * @returns якщо вдало - обновлюються дані кошика на сторінці
  */
function removeFromCart(itemId){
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
        type: 'POST',
        url: "/cart/removefromcart/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            if (data['success']){
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_' + itemId).show();
                $('#removeCart_' +itemId).hide();
            }
        }
    });
}

/**
 * Підрахунок вартості куплених товарів
 * 
 * @param integer itemId ID товару
 */
function conversionPrice(itemId){
    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;
    
    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}