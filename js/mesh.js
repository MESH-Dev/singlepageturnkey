// var scrollLinks = document.querySelectorAll('header a');
//
// for (var i = 0; i < scrollLinks.length; i++) {
//    scrollLinks[i].addEventListener('click', function(event){
//       event.preventDefault();
//       var scrollId = this.href.split('#')[1];
//       document.getElementById(scrollId).scrollIntoView({
//          behavior: 'smooth',
//          block: 'center'
//       });
//    });
// }

jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  $('a[href*=#]:not([href=#])').click(function() {
       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
           || location.hostname == this.hostname) {

           var target = $(this.hash);
           target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                    scrollTop: (target.offset().top - 60)
               }, 600);
               return false;
           }
       }
   });

   $('#scrollLink').click(function(){
      var dist = ($('#top').outerHeight()) - 60;
      $('html,body').animate({
         scrollTop: (dist)
      }, 600);
      console.log(dist);
   });

});
