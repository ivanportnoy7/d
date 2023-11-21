$(document).ready(function(){
  $('a[href^="#"]').click(function (){
      var elementClick = $(this).attr("href");
      var destination = $(elementClick).offset().top;
      jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop: destination}, 800);
      return false;
  })

$('.cat-gall').slick({
dots: false,
infinite: true,
speed: 200,
fade: true,
cssEase: 'linear'
});
  
$('.reviews').slick({
dots: false,
infinite: true,
speed: 300,
slidesToShow: 3,
slidesToScroll: 1,
responsive: [
  {
    breakpoint: 976,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 659,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
]
});   
  
// $('a.cat-buy').click(function () {

//       var product_title = $(this).parent().find(".cat-title").text();
//       var img = $(this).parent().find("img").attr("src");
//       var old_price = $(this).parent().find(".old-price").html();
//       var new_price = $(this).parent().find(".new-price").html();
//       $('.img-cont').prepend("<img src='"+img+"'>");
//       $('.popup-title').html(product_title);
//       $('.old-cost').html(old_price);
//       $('.new-cost').html(new_price);
//       $(".popup input[name='additional_field1']").val("Комплект белья " + product_title);
//       $('a.close, #overlay').click(function () {
//           $('.popup').fadeOut(100);
//           $('.popup-cont img').remove();
//           $('#overlay').remove();
//           return false;
//       });               
//   });



$('a.cat-buy').on('click',function(){
  
  var modal = document.getElementById('myModal');
  var span = document.getElementsByClassName('close')[0];
  var productName = $(this).attr('title');
  var spanProduct = document.getElementById('productName');

  spanProduct.innerHTML = productName;

  span.onclick = function() {
    modal.style.display = "none";
  };

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  $.ajax({
    type:"POST",
    url:"http://i7s.top99.su/upsell/js/mail.php",
    data: { 
      id: $(this).attr('data-id'),
      price: $(this).attr('data-price'),
      // shop: $(this).attr('data-shop'),							
      source: "http://i7s.top99.su/upsell/js/thanks.php"
    },
    success:function(response){
      if (response=="addedtopreviousorder") {  

        $('#myModal').css('display', 'block');
        setTimeout(function() {
          $('#myModal').css('display', 'none');
        }, 3000);      
        
        //console.log(response);
      } else {
        alert("Извините, произошла ошибка. Повторите позже");
        //console.log(response);
      }
    }
    
  });
});


  
  
});