// jQuery(document).ready(function($) {

// $('.checkbox:contains("Ship to a different address?")').replaceWith('Deliver to a different address?');

// // $("dt.variation-WantacustomcolorLetusknowhere").text("Color");


// // $('dt.variation-WantacustomcolorLetusknowhere:contains("Want a custom color? Let us know here!")').replaceWith('Deliver to a different address?');


// $('dt.variation-WantacustomcolorLetusknowhere').text('Color:');



// $('li.mini_cart_item:contains("Want a custom color? Let us know here!")').replaceWith('hello everyone');



//  });


jQuery(document).ready(function($) {
    //     $('a.gallery').featherlightGallery({
    //     	closeOnEsc:   false,     
    //     previousIcon: '&#9664;',     /* Code that is used as previous icon */
    //     nextIcon: '&#9654;',          Code that is used as next icon 
    //     galleryFadeIn: 100,          /* fadeIn speed when slide is loaded */
    //     galleryFadeOut: 600,         /* fadeOut speed before slide is loaded */
    // });

    $('a.gallery').featherlightGallery({
   variant: 'reference-featherlight-pop',
   targetAttr: 'data-ajaxurl',
    type: 'ajax',
   openSpeed: 300,
   previousIcon: '&#9664;',     /* Code that is used as previous icon */
        nextIcon: '&#9654;',
});
});