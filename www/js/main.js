 /**
  * Функція додавання товара в кошик
  * 
  * @param integer itemID  ID продукта
  * @return якщо успішно, то обновляються данні кошика на сторінці
  */
 
 function addToCart(){
     console.log("js - addToCart()");
     $.ajax({
         type: 'POST',
         async: false,
         url: "/cart/addtocart/" + itemId + '/',
         dataType: 'json',
         success: function(data){
             if (data['success']) {
                 $('#cartCntItems').html(data['cntItems']);
                 
                 $('#addCart_'+ itemId).hide();
                 $('#removeCart_'+ itemId).show();
             }
         }
     });
 }