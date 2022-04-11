//SIDENAV DA NAVBAR MOBILE
$(document).ready(function(){
  $('.sidenav').sidenav();
});

//CAROUSEL
$('.carousel.carousel-slider').carousel({
  fullWidth: true,
  indicators: true
});

//SMOOTH SCROLL
$(document).ready(function(){
  $("a").on('click', function(event) {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 800);
  });
});