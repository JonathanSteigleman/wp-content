/////////////////////////////////////////////////////////////
// File for our team's JavaScript Functions
///////////////////////////////////////////////////////////// 

// Show the mobile navigation menu when you click on the icon
// Contributer: Kali
function showMobileNav() {
    var x = document.getElementById("responsiveMenu");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

// Kali's attempt to get the icon to change font awesome classes
// Is not working
// Considering alternative options
// I've got one that I think will work :)
$('#responsiveMenu a').click(function(){
    //$(this).next('ul').slideToggle('500');
    $(this).find('i').toggleClass('fa fa-bars fa fa-times')
});