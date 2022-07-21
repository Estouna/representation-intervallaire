//BURGER
const spinContainer = document.querySelector(".spin-container");
const btn = document.querySelector(".btn");
const panel = document.getElementById("panel");


btn.addEventListener("click", () => {
    spinContainer.classList.toggle("active");
    btn.classList.toggle("active");
    panel.classList.toggle("active");
});