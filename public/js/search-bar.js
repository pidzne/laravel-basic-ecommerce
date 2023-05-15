// open and close search bar
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}
function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}

// open and close account 
let openBtn = document.getElementById("openForm");
function openMenu() {
  openBtn.classList.toggle("open-menu");
}
