// When the user scrolls the page, execute myFunction
window.onscroll = function() {
    var header = document.getElementById("main-header");
    if (window.pageYOffset > header.offsetTop) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
};

var collapseElements = document.getElementsByClassName("collapse");
var i;

for (i = 0; i < collapseElements.length; i++) {
    collapseElements[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.querySelector('.sub-menu');
        if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
    });
}

document.getElementById("menu-hamburguer").addEventListener("click", function() {
    var menu = document.getElementsByClassName("menu")[0];
    menu.classList.toggle("active");
    if (menu.style.maxHeight){
        menu.style.maxHeight = null;
        document.getElementById("main-header").style.backgroundColor = "";
    } else {
        menu.style.maxHeight = "100vh";
        document.getElementById("main-header").style.backgroundColor = "#fff";
      }
});