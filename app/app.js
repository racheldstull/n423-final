function redirect(){
    window.location.href = "http://stackoverflow.com";
}


$("#topic-topicDetailsTemplate").on("click", function(){
    window.location.href = "topicDetailsTemplate.html";
});



$(document).on("scroll", function(){
    if ($(document).scrollTop() > 100){
        $("nav").css("height", "80px");
        $("nav .nav-left .nav-logo a .small-logo").css("display", "none");
        $("nav .nav-left .nav-logo a img").css("height", "30px");
        $("nav .nav-left .nav-logo a img").css("margin-top", "25px");
        $("nav .nav-right .nav-links a").css("line-height", "80px");
    } else {
        $("nav").css("height", "100px");
        $("nav .nav-left .nav-logo a .small-logo").css("display", "inline");
        $("nav .nav-left .nav-logo a img").css("height", "40px");
        $("nav .nav-left .nav-logo a img").css("margin-top", "30px");
        $("nav .nav-right .nav-links a").css("line-height", "100px");
    }
});

$(document).ready(function(){

});