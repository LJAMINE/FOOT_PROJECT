// const clickmeButton = document.getElementById("clickme");
// const closemeButton = document.getElementById("closeme");
// const drawer = document.querySelector(".drawar");

// clickmeButton.addEventListener("click", (event) => {

//     event.preventDefault()
//     drawer.style.display = "block";
// });

// closemeButton.addEventListener("click", () => {
//     drawer.style.display = "none";
// });


const clickmeButton = document.getElementById("clickme");
const closemeButton = document.getElementById("closeme");
const drawer = document.querySelector(".drawar");

clickmeButton.addEventListener("click", () => {
    drawer.style.display = "block";
});

closemeButton.addEventListener("click", () => {
    drawer.style.display = "none";
});
