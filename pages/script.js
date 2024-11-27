const addButon = document.querySelectorAll(".addButton");
const closemeButton = document.getElementById("closeme");
const drawar = document.querySelector(".drawar");
const submitButton = document.getElementById("submitButton");
const playerForm = document.getElementById("playerForm");

let currentPosition = '';

addButon.forEach(button => {
    button.addEventListener("click", (event) => {
        currentPosition = event.target.getAttribute("player-post");
        console.log(currentPosition)
        drawar.style.display = "block";
    });
});

closemeButton.addEventListener("click", () => {
    drawar.style.display = "none";
});
let arrayTable;

function getData() {


    let playerData = {
        nameInput: document.getElementById("name").value,
        nationality: document.getElementById("nationality").value,
        photo: document.getElementById("photo").value,
        flag: document.getElementById("flag").value,
        positionPlayer: document.getElementById("positionPlayer").value,
        club: document.getElementById("club").value,
        logo: document.getElementById("logo").value,

        rating: document.getElementById("rating").value,
        pace: document.getElementById("pace").value,
        shooting: document.getElementById("shooting").value,
        passing: document.getElementById("passing").value,
        dribbling: document.getElementById("dribbling").value,
        defending: document.getElementById("defending").value,
        physical: document.getElementById("physical").value
    }


    console.log(playerData);
    return playerData;


}

submitButton.addEventListener("click", function (event) {
    event.preventDefault();
    let playerData = getData();
    function isValidUrl(value) {
        try {
            new URL(value);  
            return true;
        } catch {
            return false;  
        }
    }

    if (
        playerData.nameInput !== "" &&
        playerData.nationality !== "" &&
        isValidUrl(playerData.logo) &&
        isValidUrl(playerData.flag) &&
        playerData.club !== "" &&
        isValidUrl(playerData.photo) &&
        playerData.positionPlayer !== "" &&
        (playerData.rating !== "" && playerData.rating > 0 && playerData.rating < 100) &&
        (playerData.physical !== "" && playerData.physical > 0 && playerData.physical < 100) &&
        (playerData.shooting !== "" && playerData.shooting > 0 && playerData.shooting < 100) &&
        (playerData.defending !== "" && playerData.defending > 0 && playerData.defending < 100) &&
        (playerData.pace !== "" && playerData.pace > 0 && playerData.pace < 100) &&
        (playerData.passing !== "" && playerData.passing > 0 && playerData.passing < 100) &&
        (playerData.dribbling !== "" && playerData.dribbling > 0 && playerData.dribbling < 100) 

    ) {

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
        img.src = playerData.photo;
        playerImageContainer.appendChild(img);

        let myName = document.createElement("p");
        myName.innerText = playerData.nameInput;
        nameContainer.appendChild(myName);

        let myRating = document.createElement("p");
        myRating.innerText = `Rating: ${playerData.rating}`;
        ratings.appendChild(myRating);

        let pace = document.createElement("h6");
        pace.innerText = `PAC: ${playerData.pace}`;
        statsRight.appendChild(pace);

        let shoot = document.createElement("h6");
        shoot.innerText = `SHO: ${playerData.shooting}`;
        statsRight.appendChild(shoot);

        let pass = document.createElement("h6");
        pass.innerText = `PAS: ${playerData.passing}`;
        statsRight.appendChild(pass);

        let dribbling = document.createElement("h6");
        dribbling.innerText = `DRI: ${playerData.dribbling}`;
        statsLeft.appendChild(dribbling);

        let defence = document.createElement("h6");
        defence.innerText = `DEF: ${playerData.defending}`;
        statsLeft.appendChild(defence);

        let physical = document.createElement("h6");
        physical.innerText = `PHY: ${playerData.physical}`;
        statsLeft.appendChild(physical);

        let flagCountry = document.createElement("img");
        flagCountry.src = playerData.flag;
        flagContainer.appendChild(flagCountry);

        let clubLogo = document.createElement("img");
        clubLogo.src = playerData.logo;
        flagContainer.appendChild(clubLogo);

        drawar.style.display = "none";
        playerForm.reset();
    } else {
        alert("entrer les info ");
        // console.error(error)

    }


});

// ------------------------------Gk--------------------------

const submitButtonGK = document.getElementById("submitButtonGK");

const clickGK = document.querySelector(".clickGK");
const closemeGK = document.getElementById("closemeGK");
const drawarGK = document.querySelector(".drawarGK");

clickGK.addEventListener("click", () => {
    drawarGK.style.display = "block";
});

closemeGK.addEventListener("click", () => {
    drawarGK.style.display = "none";
});



function getDataGK() {
    let nameInput = document.getElementById("nameGK").value
    let nationality = document.getElementById("nationalityGK").value
    let photo = document.getElementById("photoGK").value
    let flag = document.getElementById("flagGK").value
    let positionPlayer = document.getElementById("positionPlayerGK").value
    let club = document.getElementById("clubGK").value

    let logo = document.getElementById("logoGK").value
    let rating = document.getElementById("ratingGK").value
    let diving = document.getElementById("diving").value
    let handling = document.getElementById("handling").value
    let kicking = document.getElementById("kicking").value
    let reflexes = document.getElementById("reflexes").value
    let speed = document.getElementById("speed").value
    let positioning = document.getElementById("positioning").value

    arrayTable = [nameInput, flag, nationality, photo, positionPlayer, club, logo, rating, diving, handling, kicking, reflexes, speed, positioning];
    console.log(arrayTable);
    console.log("hada l Gk info");
    return arrayTable;
}




submitButtonGK.addEventListener("click", function (event) {
    event.preventDefault()
    let nameofPlayer = document.getElementById("nameofPlayer")
    let myplayerImage = document.getElementById("myplayerImage")
    let statsRight = document.getElementById("statsRight")
    let statsleft = document.getElementById("statsleft")
    let ratingss = document.getElementById("ratingss")
    let flagss = document.getElementById("flagss")


    getDataGK()
    let img = document.createElement("img");
    img.src = arrayTable[3];
    myplayerImage.appendChild(img);
    console.log(myplayerImage);



    let myGkname = document.createElement("p")
    myGkname.innerText = arrayTable[0]
    nameofPlayer.appendChild(myGkname)
    console.log(nameofPlayer);


    myGkrating = document.createElement("p")
    myGkrating.innerText = `${arrayTable[7]}`
    ratingss.appendChild(myGkrating)
    console.log(ratingss);

    let diving = document.createElement("h6")
    diving.innerText = `div:${arrayTable[8]}`
    statsRight.appendChild(diving)
    console.log(statsRight);


    let handling = document.createElement("h6")
    handling.innerText = `hand:${arrayTable[9]}`
    statsRight.appendChild(handling)
    console.log(statsRight);


    let kicking = document.createElement("h6")
    kicking.innerText = `kick:${arrayTable[10]}`
    statsRight.appendChild(kicking)
    console.log(statsRight);



    let reflexes = document.createElement("h6")
    reflexes.innerText = `REF:${arrayTable[11]}`
    statsleft.appendChild(reflexes)
    console.log(statsleft);



    let speed = document.createElement("h6")
    speed.innerText = `SPE:${arrayTable[12]}`
    statsleft.appendChild(speed)
    console.log(statsleft);


    let positioning = document.createElement("h6")
    positioning.innerText = `POS:${arrayTable[13]}`
    statsleft.appendChild(positioning)
    console.log(statsleft);




    let flagcountry = document.createElement("img");
    flagcountry.src = arrayTable[1];
    flagss.appendChild(flagcountry);
    console.log(flagss);


    let clubequipe = document.createElement("img");
    clubequipe.src = arrayTable[6];
    flagss.appendChild(clubequipe);
    console.log(clubequipe);




})