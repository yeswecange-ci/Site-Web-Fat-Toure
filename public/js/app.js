

window.addEventListener("scroll", function () {
  const nav = document.querySelector(".navigation");
  if (window.scrollY > 0) {
    nav.classList.add("white");
  } else {
    nav.classList.remove("white");
  }
});
//   
  // Menu toggle animation
        const menuToggle = document.getElementById("menuToggle");
        const menu = document.getElementById("menu");

        menuToggle.addEventListener("click", () => {
            menuToggle.classList.toggle("active");
            menu.classList.toggle("active");
        });