$(document).ready(function(){
    $('a[href^="#"]').click(function (){
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    })
    
$('.reviews_1').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  adaptiveHeight: true,    
  responsive: [
    {
      breakpoint: 976,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1      }
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
    
   /* FAQ */
  
  function faqInitialization() {
    $(".faq_block .question_item .question").prepend("<span class='icon'></span>");
    $(".faq_block .question_item:eq(0)").addClass("active");
    var answer_text = $(".faq_block .question_item.active .answer").text();
    $(".faq_block").append("<div class='answer_block'>"+answer_text+"</div>");
  }

  faqInitialization();

  $(".faq_block .question_item .question").click(function(){
    if ($(".faq_block .answer_block").css("display") == "block") {
      $(".faq_block .question_item").removeClass("active");
      $(this).parent().addClass("active");
      var answer_text = $(".faq_block .question_item.active .answer").text();
      $(".faq_block .answer_block").text(answer_text);
    }
  });
    
    
});

