//Show the mobile navigation menu when you click on the icon
function showMobileNav() {
    var x = document.getElementById("responsiveMenu");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

$('#responsiveMenu a').click(function(){
    //$(this).next('ul').slideToggle('500');
    $(this).find('i').toggleClass('fa fa-bars fa fa-times')
});