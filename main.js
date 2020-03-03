// When the user scrolls the page, execute myFunction
window.onscroll = function() {
    var header = document.getElementById("main-header");
    if (window.pageYOffset > header.offsetTop) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
};