var meja=4;
var index=0;
$(document).ready(function(){
    
    $( ".exit" ).click(function() {
      $(this).closest('.module').remove();
    });
    
    $( "#gumb" ).click(function() {
        $( "#modal" ).toggleClass("modal-visible modal-hidden");
    });
  
    $("#gallery_controls").on('click', 'span', function() {
        $("#gallery img").removeClass("show");

        var newImage = $(this).index();
        index = newImage+1;
        $("#gallery img").eq(newImage).addClass("show");
        $("#gallery_controls span").removeClass("selected");
        $(this).addClass("selected");
    });
    
    $(function() {
        setInterval( "menjaj()", 3500 );
    });
    
    $("a[href='#top']").click(function() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    });
});

function menjaj(){
    if(index<meja-1){
        var $active = $('#gallery img.show');  //izberemo aktivnega
        $active.removeClass('show');
        $active.next().addClass('show');
        index++;
    }else{
        index=0;
        $('#gallery img:first').addClass('show');
        $('#gallery img:last').removeClass('show');
    }
}