var dropdownEls = document.getElementsByClassName("s-parent");
var sidenavEl = document.getElementById("sidenav");
var mainEl = document.getElementById("main");

document.getElementById("toggle-sidenav").addEventListener("click", function() {
  sidenavEl.classList.toggle("s-hide");
  mainEl.classList.toggle("s-expand");
});

var i = 0;

for (i=0; i<dropdownEls.length; i++) {
  dropdownEls[i].addEventListener("click", function() {
    this.classList.toggle("s-active");
  });
}

