/* burger menu for responsive design */
function toggleMenu(button) {
    button.classList.toggle("change");

    /* show / hide menu */
    var navList = document.getElementsByClassName("nav-list");
    if (navList[0].style.display == "flex") {
        navList[0].style.display = "none";
    } else {
        navList[0].style.display = "flex";
    }
}