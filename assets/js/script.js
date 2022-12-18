var slide = document.querySelector(".slide-close");
var sidebar = document.querySelector(".sidebar");

slide.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})