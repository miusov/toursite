(function($) {
	$(function() {
		// scrollNavbar
		$(window).scroll(function(){
            if ( $(this).scrollTop() > 200 ){
                $('nav').addClass('navbar-fixed-top');
            } else if($(this).scrollTop() <= 100 ) {
                $('nav').removeClass('navbar-fixed-top');
            }
        });

$('.tbtours tbody tr').hide();
        $('#bt').click(function() {
            $('.tbtours tbody tr').hide();
            var selcity = $('select#cityid option:selected').text();
           $('tr[id="'+selcity+'"]').slideDown();
    });

	}) 
})(jQuery)