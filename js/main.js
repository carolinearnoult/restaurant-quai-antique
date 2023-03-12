$(window).scroll(function () {

 if($(window).scrollTop() > 0) {
    $('.navbar').css("background", "#121212");
 } else {
    $(".navbar").css("background", "transparent");
 }
 
});


