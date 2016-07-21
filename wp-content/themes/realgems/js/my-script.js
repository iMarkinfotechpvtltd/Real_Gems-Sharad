// JavaScript Document




jQuery(function(){

  jQuery('.side-search').click(function(){
  
    jQuery('.side-search').toggleClass('slide-input');
	   
  });
 jQuery( ".side-search .form-control" ).click(function( event ) {
      event.stopPropagation();
  }); 
 jQuery(document).on("click", function(e) {
    if (jQuery(e.target).is(".side-search") === false) {
     jQuery(".side-search").removeClass("slide-input");
    }
  });
  
/*************************Sticky NAV****/  
  
  var stickyNavTop = jQuery('.navigation').offset().top;
 
var stickyNav = function(){
var scrollTop =  jQuery(window).scrollTop();
      
if (scrollTop > stickyNavTop) { 
   jQuery('.navigation').addClass('sticky');
} else {
     jQuery('.navigation').removeClass('sticky'); 
}
};
 
stickyNav();
 
 jQuery(window).scroll(function() {
    stickyNav();
});
  
});


	
	
jQuery('.center').slick({
  loop:true,	
  centerMode: true,
  centerPadding: '0',
  slidesToShow: 5,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    }
  ]
});


/********************************** OWL CAROUSEL ***************/

jQuery('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:4,
            nav:false
        },
        1000:{
            items:6,
            nav:true,
            loop:false
        }
    }
});




jQuery(window).load(function(){
    jQuery('#p-carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth:80,
        itemMargin:10,
        asNavFor: '#slider'
      });

jQuery('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#p-carousel",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });  
  
/**********************************parent class target*****************/

