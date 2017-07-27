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

/**
 * Отримання даних з форми 
 *
 */
function getData(obj_form){
    var hData = {};
    $('input, textarea, select', obj_form).each(function(){
        if(this.name && this.name!=''){
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
};


/**
 * Реєстрація нового користувача
 * 
 */
function registerNewUser(){
    var postData = getData('#registerBox');
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if (data['success']) {
                alert('Реєстрація пройшла успішно');
                
                //>блок в лівому стовпці
                $('#registerBox').hide();
                
                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<
                
                //> Сторінка замовлення
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
            } else {
                alert(data['message']);
            }
        }
        
    });

}

/**
 * Авторизація корисувача
 * 
 */
function login(){
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();
    
    var postData = "email=" + email + "&pwd=" + pwd;
    
    $.ajax({
        type: 'POST',
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();
                
                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
                
                //>Заповнюємо поля на сторінці замовлення
                $('#name').val(data['name']);
                $('#phone').val(data['phone']);
                $('#adress').val(data['adress']);
                //<
                
                $('#btnSaveOrder').show();
                
            } else {
                alert(data['message']);
            }
        }
    });
}
/**
 * Показати або сховати форму реєстрації
 *  
 */
function showRegisterBox(){
    if( $("#registerBoxHidden").css('display') != 'block') {
        $("#registerBoxHidden").show();
    } else {
        $("#registerBoxHidden").hide();
    }
}

/**
 * Оновлення даних користувача
 * @returns {undefined}
 */
function updateUserData(){
    console.log("js - updateUserData()");
    var phone =     $('#newPhone').val();
    var adress =    $('#newAdress').val();
    var pwd1 =      $('#newPwd1').val();
    var pwd2 =      $('#newPwd2').val();
    var curPwd =    $('#curPwd').val();
    var name =      $('#newName').val();
    
    var postData = {
        phone:  phone,
        adress: adress,
        pwd1:   pwd1,
        pwd2:   pwd2,
        curPwd: curPwd,
        name:   name};
    
    $.ajax({
        type: 'POST',
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#userLink').html(data['userName']);
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}

