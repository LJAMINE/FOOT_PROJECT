const addButton = document.querySelectorAll(".addButton");
const closemeButton = document.getElementById("closeme");
const drawar = document.querySelector(".drawar");
const submitButton = document.getElementById("submitButton");
const playerForm = document.getElementById("playerForm");

const submitButtonGK = document.getElementById("submitButtonGK");
const clickGK = document.querySelector(".clickGK");
const closemeGK = document.getElementById("closemeGK");
const drawarGK = document.querySelector(".drawarGK");

let currentPosition = "";


function clearCardData(card) {
    card.querySelector("#myplayerImage").innerText = "";
    card.querySelector("#statsRight").innerText = "";
    card.querySelector("#statsleft").innerText = "";
    card.querySelector("#ratingss").innerText = "";
    card.querySelector("#flagss").innerText = "";
    card.querySelector("#nameofPlayer").innerText = "";
}

function updateCardData(card, playerData, stats) {
    const playerImageContainer = card.querySelector("#myplayerImage");
    playerImageContainer.innerText = "";
    const img = document.createElement("img");
    img.src = playerData.photo;
    playerImageContainer.appendChild(img);

    // Name
    const nameContainer = card.querySelector("#nameofPlayer");
    nameContainer.innerText = "";
    const nameElement = document.createElement("p");
    nameElement.innerText = playerData.name;
    nameContainer.appendChild(nameElement);

    // Rating
    const ratings = card.querySelector("#ratingss");
    ratings.innerText = "";
    const ratingElement = document.createElement("p");
    ratingElement.innerText = `Rating: ${playerData.rating}`;
    ratings.appendChild(ratingElement);

    // Stats
    const statsLeft = card.querySelector("#statsleft");
    const statsRight = card.querySelector("#statsRight");
    statsLeft.innerText = "";
    statsRight.innerText = "";
    stats.left.forEach(stat => {
        const statElement = document.createElement("h6");
        statElement.innerText = `${stat.label}: ${stat.value}`;
        statsLeft.appendChild(statElement);
    });
    stats.right.forEach(stat => {
        const statElement = document.createElement("h6");
        statElement.innerText = `${stat.label}: ${stat.value}`;
        statsRight.appendChild(statElement);
    });

    // flag , club Logo
    const flagContainer = card.querySelector("#flagss");
    flagContainer.innerText = "";
    const flag = document.createElement("img");
    flag.src = playerData.flag;
    flagContainer.appendChild(flag);
    const logo = document.createElement("img");
    logo.src = playerData.logo;
    flagContainer.appendChild(logo);
}


addButton.forEach(button => {
    button.addEventListener("click", (event) => {
        currentPosition = event.target.getAttribute("player-post");
        drawar.style.display = "block";
    });
});

closemeButton.addEventListener("click", () => {
    drawar.style.display = "none";
});

// normal  players
submitButton.addEventListener("click", (event) => {
    event.preventDefault();
    const playerData = getPlayerData();

    if (isPlayerinfoValid(playerData)) {
        const selectedPositionCard = document.getElementById(currentPosition);

        const stats = {
            left: [
                { label: "DRI", value: playerData.dribbling },
                { label: "DEF", value: playerData.defending },
                { label: "PHY", value: playerData.physical }
            ],
            right: [
                { label: "PAC", value: playerData.pace },
                { label: "SHO", value: playerData.shooting },
                { label: "PAS", value: playerData.passing }
            ]
        };

        clearCardData(selectedPositionCard);
        updateCardData(selectedPositionCard, playerData, stats);
        drawar.style.display = "none";
        playerForm.reset();
    } else {
        alert("Please entrer tout correctly.");
    }
});

// ------------------------------------GK----------------------------------

clickGK.addEventListener("click", (event) => {
    currentPosition = event.target.getAttribute("player-post");

    drawarGK.style.display = "block";
});

closemeGK.addEventListener("click", () => {
    drawarGK.style.display = "none";
});

submitButtonGK.addEventListener("click", (event) => {
    event.preventDefault();
    const goalkeeperData = getGoalkeeperData();

    if (isGoalkeepeinfoValid(goalkeeperData)) {
        const selectedPositionCard = document.getElementById(currentPosition);

        const stats = {
            left: [
                { label: "DIV", value: goalkeeperData.diving },
                { label: "HAN", value: goalkeeperData.handling },
                { label: "KIC", value: goalkeeperData.kicking }
            ],
            right: [
                { label: "REF", value: goalkeeperData.reflexes },
                { label: "SPE", value: goalkeeperData.speed },
                { label: "POS", value: goalkeeperData.positioning }
            ]
        };

        clearCardData(selectedPositionCard);
        updateCardData(selectedPositionCard, goalkeeperData, stats);
        drawarGK.style.display = "none";
    } else {
        alert("Please entrer tout correctly.");
    }
});


function getPlayerData() {
    return {
        name: document.getElementById("name").value,
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
    };
}

function getGoalkeeperData() {
    return {
        name: document.getElementById("nameGK").value,
        photo: document.getElementById("photoGK").value,
        flag: document.getElementById("flagGK").value,
        club: document.getElementById("clubGK").value,
        logo: document.getElementById("logoGK").value,
        rating: document.getElementById("ratingGK").value,
        diving: document.getElementById("diving").value,
        handling: document.getElementById("handling").value,
        kicking: document.getElementById("kicking").value,
        reflexes: document.getElementById("reflexes").value,
        speed: document.getElementById("speed").value,
        positioning: document.getElementById("positioning").value
    };
}
function isValidUrl(value) {
    try {
        new URL(value);
        return true;
    } catch {
        return false;
    }
}


function isPlayerinfoValid(data) {
    return (
        data.name &&
        isValidUrl(data.photo) &&
        isValidUrl(data.flag) &&
        data.club &&
        isValidUrl(data.logo) &&
        data.rating > 0 && data.rating <= 99 &&
        data.pace > 0 && data.pace <= 99 &&
        data.shooting > 0 && data.shooting <= 99 &&
        data.passing > 0 && data.passing <= 99 &&
        data.dribbling > 0 && data.dribbling <= 99 &&
        data.defending > 0 && data.defending <= 99 &&
        data.physical > 0 && data.physical <= 99
    );
}

function isGoalkeepeinfoValid(data) {
    return (
        data.name &&
        isValidUrl(data.photo) &&
        isValidUrl(data.flag) &&
        data.club &&
        isValidUrl(data.logo) &&
        data.rating > 0 && data.rating <= 99 &&
        data.diving > 0 && data.diving <= 99 &&
        data.handling > 0 && data.handling <= 99 &&
        data.kicking > 0 && data.kicking <= 99 &&
        data.reflexes > 0 && data.reflexes <= 99 &&
        data.speed > 0 && data.speed <= 99 &&
        data.positioning > 0 && data.positioning <= 99
    );
}
