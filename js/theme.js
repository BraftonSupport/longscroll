jQuery(document).ready(function($){

  // making sure the navigation works on the home page as well as on the blog pages
  $( '.home .main-navigation a' ).each(function(){
  	var string = $(this).attr('href');
  	string=string.replace(/http.+?(?=#)/g, '');
  	$(this).attr('href', string);
  })

  // smooth scroll
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top)-200
        }, 1000);
        return false;
      }
    }
  });

  // Homepage team image border color the same as the background
  var bg = $( ".teammiddle" ).parents(".background").css('background-color');
  if (bg == 'rgba(0, 0, 0, 0)' ){
  bg='#f0f0f0';
  }
  $( ".teammiddle img" ).css("border-color", bg);

  $( ".team .container:first-of-type").removeClass('hide');
  $(".fa-spinner").fadeTo( "fast", 1 ).delay(100).fadeTo( "fast", 0 );

  $( ".team .container:not(:first-of-type) .previous.button" ).click( function() {
    $(".fa-spinner").fadeTo( "fast", 1 ).delay(100).fadeTo( "fast", 0 );
    $(this).parents(".container").addClass('hide');
    $(this).parents(".container").prev().removeClass('hide');
    // $(".fa-spinner")
    //   .delay(800).fadeTo(0); 
      // .queue(function (next) { 
      //   $(this)
      //   next(); 
      // });
  });

  $( ".team .container:not(:last-of-type) .next.button" ).click( function() {
    $(".fa-spinner").fadeTo( "fast", 1 ).delay(100).fadeTo( "fast", 0 );
    $(this).parents(".container").addClass('hide');
    $(this).parents(".container").next().removeClass('hide');
    // $(".fa-spinner")
      
      // .queue(function (next) { 
      //   $(this)
      //   next(); 
      // });
  });
});