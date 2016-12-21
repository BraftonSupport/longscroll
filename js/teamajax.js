jQuery(document).ready(function($){
  // Homepage Team section ajax-ness
  $('.teammiddle .button').click(function () {
    var teampostid = $(this).attr( 'data-postid' );

    // This does the ajax request
    $.ajax({
        url: team_ajax_object.ajaxurl,
        data: {
            'action':'team_ajax_request',
            'teampostid' : teampostid
        },
        success:function(data) {
            // This outputs the result of the ajax request
            console.log(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });
  });
});