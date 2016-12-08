jQuery(document).ready(function($){
  var bg = $( ".teammiddle" ).parents(".background").css('background-color');
  if (bg == 'rgba(0, 0, 0, 0)' ){
	bg='#f0f0f0';
  }
  $( ".teammiddle img" ).css("border-color", bg);

  $( ".home .main-navigation a" ).each(function(){
	var string = $(this).attr('href');
	string=string.replace(/http.+?(?=#)/g, '');
	$(this).attr('href', string);
  })

  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
  
});