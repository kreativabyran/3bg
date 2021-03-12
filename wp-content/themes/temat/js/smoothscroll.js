jQuery(function($) {
    var upperLimit = 100; 
    var scrollSpeed = 600;
    var scrollStyle = 'swing';
    jQuery('#primary-menu a[href*=#]:not([href=#])').click(function() {
        var obj = this;
        jQuery("#primary-menu li").removeClass("active");
        jQuery(obj).parent().addClass("active");
        if (location.pathname.replace(/^\//,'') == obj.pathname.replace(/^\//,'') || location.hostname == obj.hostname) {
            var target = jQuery(obj.hash),
            headerHeight = jQuery(".primary-header").height() + 5; // Get fixed header height
            target = target.length ? target : jQuery('[name=' + obj.hash.slice(1) +']');
            if (target.length) {
                jQuery('html,body').animate({ scrollTop: target.offset().top }, scrollSpeed, scrollStyle );
                return false;
            }
        }
    });
});