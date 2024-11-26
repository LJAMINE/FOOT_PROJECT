const addButon = document.querySelectorAll(".addButton");
const closemeButton = document.getElementById("closeme");
const drawer = document.querySelector(".drawar");
const submitButton = document.getElementById("submitButton");
const playerForm = document.getElementById("playerForm");

let currentPosition = '';

addButon.forEach(button => {
    button.addEventListener("click", (event) => {
        currentPosition = event.target.getAttribute("player-post");
        console.log(currentPosition)
        drawer.style.display = "block";
    });
});

closemeButton.addEventListener("click", () => {
    drawer.style.display = "none";
});
let arrayTable;

function getData() {
    let nameInput = document.getElementById("name").value;
    let nationality = document.getElementById("nationality").value;
    let photo = document.getElementById("photo").value;
    let flag = document.getElementById("flag").value;
    let positionPlayer = document.getElementById("positionPlayer").value;
    let club = document.getElementById("club").value;

    let logo = document.getElementById("logo").value;
    let rating = document.getElementById("rating").value;
    let pace = document.getElementById("pace").value;
    let shooting = document.getElementById("shooting").value;
    let passing = document.getElementById("passing").value;
    let dribbling = document.getElementById("dribbling").value;
    let defending = document.getElementById("defending").value;
    let physical = document.getElementById("physical").value;


    arrayTable = [nameInput, flag, nationality, photo, positionPlayer, club, logo, rating, pace, shooting, passing, dribbling, defending, physical];

    console.log(arrayTable);
    return arrayTable;
}

submitButton.addEventListener("click", function (event) {
    event.preventDefault();

    getData();

    const selectedPositionCard = document.getElementById(currentPosition);

    const playerImageContainer = selectedPositionCard.querySelector(`#myplayerImage`);
    const statsRight = selectedPositionCard.querySelector(`#statsRight`);
    const statsLeft = selectedPositionCard.querySelector(`#statsleft`);
    const ratings = selectedPositionCard.querySelector(`#ratingss`);
    const flagContainer = selectedPositionCard.querySelector(`#flagss`);
    const nameContainer = selectedPositionCard.querySelector(`#nameofPlayer`);

    // "" vide
    playerImageContainer.innerText = '';
    statsRight.innerText = '';
    statsLeft.innerText = '';
    ratings.innerText = '';
    flagContainer.innerText = '';
    nameContainer.innerText = '';

    let img = document.createElement("img");
    img.src = arrayTable[3];
    playerImageContainer.appendChild(img);

    let myName = document.createElement("p");
    myName.innerText = arrayTable[0];
    nameContainer.appendChild(myName);

    let myRating = document.createElement("p");
    myRating.innerText = `Rating: ${arrayTable[7]}`;
    ratings.appendChild(myRating);

    let pace = document.createElement("h6");
    pace.innerText = `PAC: ${arrayTable[8]}`;
    statsRight.appendChild(pace);

    let shoot = document.createElement("h6");
    shoot.innerText = `SHO: ${arrayTable[9]}`;
    statsRight.appendChild(shoot);

    let pass = document.createElement("h6");
    pass.innerText = `PAS: ${arrayTable[10]}`;
    statsRight.appendChild(pass);

    let dribbling = document.createElement("h6");
    dribbling.innerText = `DRI: ${arrayTable[11]}`;
    statsLeft.appendChild(dribbling);

    let defence = document.createElement("h6");
    defence.innerText = `DEF: ${arrayTable[12]}`;
    statsLeft.appendChild(defence);

    let physical = document.createElement("h6");
    physical.innerText = `PHY: ${arrayTable[13]}`;
    statsLeft.appendChild(physical);

    let flagCountry = document.createElement("img");
    flagCountry.src = arrayTable[1];
    flagContainer.appendChild(flagCountry);

    let clubLogo = document.createElement("img");
    clubLogo.src = arrayTable[6];
    flagContainer.appendChild(clubLogo);

    drawer.style.display = "none";
    playerForm.reset();
});

