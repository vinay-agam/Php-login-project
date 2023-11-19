$(document).ready(function(){
  $(".statebtn").click(function(){
    $(".statepopup").toggle();
$('html, body').animate({
            scrollTop: 0
        } );
  });

$(".cbtn").click(function(){
    $(".coupopup").toggle();

$('html, body').animate({
            scrollTop: 0
        });
  });


$(".disbtn").click(function(){

    $(".dispopup").toggle();
 $('html, body').animate({
            scrollTop: 0
        });
  });
});