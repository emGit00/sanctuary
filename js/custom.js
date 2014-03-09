var app = {

    artistNavWords: function($) {

        //creates an array for specific artist words in menu items
        //note: I can't figure out how to escape/regex replace the apostrophe in Painter's so using Painter for now
        var keyArtistWords = [ "Ceramics" , "Woodworkers" , "Writers" , "Musicians" , "Drawing", "Painter" ];

        for(var i = 0; i < keyArtistWords.length; i++) {
           var keyArtistWord = keyArtistWords[i];

            //searches menu for array artist words and replaces them with span code that bolds the words
           $(".sub-menu a:contains('" + keyArtistWord + "')").html(function(_, html) {

/*               if(keyArtistWord === 'Painter'){
                   keyArtistWord = keyArtistWord + "'s"
                   return html.replace( keyArtistWord , "<span class='bold-text'>keyArtistWord</span>")
               } else {}*/
                return html.replace( keyArtistWord , '<span class="bold-text">' + keyArtistWord + '</span>');

            });

           //handle the word "painter's" separately
           $('.sub-menu a').each( function(){
                var jThis = $(this);
                if(jThis.text() == "Hillside Painter’s Cabin"){
                    jThis.html(function(_, html) {
                        return html.replace( "Hillside Painter’s Cabin" , "Hillside <span class='bold-text'>Painter's</span> Cabin");
                    });
                 }
                if(jThis.text() == "Orchard Painter’s Cabin"){
                    jThis.html(function(_, html) {
                        return html.replace( "Orchard Painter’s Cabin" , "Orchard <span class='bold-text'>Painter's</span> Cabin");
                    });
                }
           });
        }
    },

    parallaxScrolling: function($) {
        // Create HTML5 elements for IE
        document.createElement("article");
        document.createElement("section");

        //var $ = jQuery;
        var images = $('.hp-image');

        //hide existing images to allow for parallax scrolling
        images.css('display' , 'none');

        //retrieve images tied to each section and make it the background image
        var imgDivs = $("div[id*='imgID']");

        for (var i = 0; i < imgDivs.length; i++) {
            var imgDiv = imgDivs[i];
            var img = $(imgDiv).find('img.hp-image');
            var imgBg = img.attr("src");
            $(imgDiv).css('background', 'url(' + imgBg + ') 50% 30% no-repeat fixed');
            $(imgDiv).css('background-size' , 'cover');
        }

        $('section[data-type="background"]').each(function(){
            var $bgobj = $(this); // assigning the object

            $(window).scroll(function() {
                var yPos = -($(window.scrollTop() / $bgobj.data('speed')));

                // Put together our final background position
                var coords = '50% '+ yPos + 'px';

                // Move the background
                $bgobj.css({ backgroundPosition: coords });
            });
        });
    },

    flexslider: function($){

        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    },

    responsiveMenu: function($) {
        $(".menu-toggle").on('click', function() {
            $("#menu-main-nav").toggleClass("open");
        });
    }

 };


jQuery(document).ready(function($) {
    app.artistNavWords($);
    app.parallaxScrolling($);
    app.flexslider($);
    app.responsiveMenu($);

});