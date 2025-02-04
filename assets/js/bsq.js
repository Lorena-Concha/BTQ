/* Efecto en lineas de menú hamburguesa mobile */

$(document).ready(function(){
  $('.menu-toggle').click(function(){
      $(this).toggleClass('open');
  });
});


/* Fijar header al hacer scroll */
window.addEventListener("scroll", function() {
  var header = document.getElementById("header");
  var scrollPosition = window.scrollY;

  if (scrollPosition > 200) {
      header.classList.add("fixed-header");
  } else {
      header.classList.remove("fixed-header");
  }
});


