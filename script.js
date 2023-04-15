let login = document.querySelectorAll(".login");
let modal = document.querySelector(".modal");
let wrapper = document.querySelector(".wrapper");
login.forEach((a) =>
  a.addEventListener("click", (e) => {
    wrapper.style.opacity = 0.4;
    modal.style.display = "flex";
  })
);
