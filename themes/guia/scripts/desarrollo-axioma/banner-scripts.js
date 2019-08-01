function update_scroll_values() {
    fbanner_pos = Math.abs(jQuery(window).innerHeight() - jQuery('.banner-container').innerHeight());
    jQuery(".top-slider").length > 0 && (slider_top_pos = jQuery(".top-slider").offset().top + jQuery(".top-slider").innerHeight());
    footer_pos = jQuery('#footer').offset().top;
    fscroll_pos = jQuery(window).scrollTop() + jQuery(window).innerHeight();
}
function footer_banner_position() {
    if (fscroll_pos >= footer_pos) {
        jQuery('.banner-container').removeAttr('style');
    } else {
        if (!jQuery('.banner-container').closest('#animated-pauta').hasClass('open-banner')) {
            jQuery('.banner-container').css({
                position: 'fixed',
                top: fbanner_pos
            });
        }
    }
}
function onYouTubePlayerAPIReady() {
    player = new YT.Player('barra-fija-video', {
        events: {'onReady': onPlayerReady }
    });
}

function onPlayerReady(event) {
    playButton.on("click", function() {
        player.playVideo();
    });
    pauseButton.on("click", function() {
        player.pauseVideo();
    });
}

$(window).on('load', function(event) {
    event.preventDefault();
    setTimeout(function() {
        googletag.cmd.push(function() {
            googletag.display('ad-slot-1');
        });
    }, 100);
    jQuery('#ad-button').on('click', function() {
        if (jQuery('#ad-button').hasClass('closed')) {
            jQuery('#ad-slot-1').slideUp('slow');
            jQuery('#ad-slot-2').slideDown('slow');
            jQuery('#ad-button').addClass('opened');
            jQuery('#ad-button').removeClass('closed');
            jQuery('#ad-button').html("<i class='fa fa-caret-down' aria-hidden='true'></i> " + jQuery('#cerrar-btn').text());
            jQuery('.main-ad-container').removeClass('ad-active');
            jQuery("#abrir-btn.closed").trigger('click');
        } else if (jQuery('#ad-button.opened').hasClass('opened')) {
            jQuery('.main-ad-container').addClass('ad-active');
            jQuery('#ad-slot-1').slideDown('slow');
            jQuery('#ad-slot-2').slideUp('slow');
            jQuery('#ad-button').removeClass('opened');
            jQuery('#ad-button').addClass('closed');
            jQuery('#ad-button').html("<i class='fa fa-caret-up' aria-hidden='true'></i> " + jQuery('#abrir-btn').text());
            jQuery("#cerrar-btn.opened").trigger('click');
        }
        if (!jQuery('.banner-container').closest('#animated-pauta').hasClass('open-banner')) {
            jQuery('html, body').animate({
                scrollTop: jQuery('#footer').offset().top - 200
            }, 400);
        }
        jQuery(this).closest('#animated-pauta').toggleClass('open-banner');
    });
    if($('#animated-pauta iframe').children().length > 5){
        $('#animated-pauta').show();
        update_scroll_values();
        footer_banner_position();   
    }
});

$(document).ready(function() {
    jQuery(window).resize(function(event) {
        update_scroll_values();
        footer_banner_position();
        googletag.pubads().refresh();
    });
    jQuery(window).scroll(function(e) {
        update_scroll_values();
        footer_banner_position();
    })

    var player;
    var playButton = jQuery("#abrir-btn.closed");
    var pauseButton = jQuery("#cerrar-btn.opened");
    // Inject YouTube API script
    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
});