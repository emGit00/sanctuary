jQuery(document).ready(function($) {

    //creates an array for specific artist words in menu items
    //note: I can't figure out how to escape/regex replace the apostrophe in Painter's so using Painter for now
    var keyArtistWords = [ "Ceramics" , "Woodworkers" , "Writers" , "Musicians" , "Drawing" , "Painter" ];

    for(var i = 0; i < keyArtistWords.length; i++) {
       var keyArtistWord = keyArtistWords[i];

        //searches menu for array artist words and replaces them with span code that bolds the words
        $(".sub-menu a:contains('" + keyArtistWord + "')").html(function(_, html) {
            return html.replace( (keyArtistWord), '<span class="bold-text">' + keyArtistWord + '</span>');
        });
    }

   // $('.parallax').scrolly({bgParallax: true});

 });