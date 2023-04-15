let login = document.querySelector(".login");
let modal = document.querySelector(".modal");
let wrapper = document.querySelector(".wrapper");
login.addEventListener("click", (e) => {
  wrapper.style.opacity = 0.4;
  modal.style.display = "flex";
});
