$(document).ready(function () {

    /*Маска ввода номера телефона*/
    $(".js-phone").mask("+7(999) 999-99-99").on('click', function(){
      if($(this).val() === "+7(___) ___-__-__") {
        $(this).get(0).setSelectionRange(3,3);  
      }
    });
})