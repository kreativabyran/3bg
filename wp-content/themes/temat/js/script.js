jQuery(document).ready(function($){
	// Mobilmeny
    var $hamburger = jQuery(".hamburger");
    $hamburger.on("click", function(e){$hamburger.toggleClass("is-active")});

    // Lazyload
    if($('.lazy').length){$('.lazy').Lazy()}

});