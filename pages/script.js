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
// ------------------------empty----------------------

function clearCardData(card) {
    card.querySelector("#myplayerImage").innerText = "";
    card.querySelector("#statsRight").innerText = "";
    card.querySelector("#statsleft").innerText = "";
    card.querySelector("#ratingss").innerText = "";
    card.querySelector("#flagss").innerText = "";
    card.querySelector("#nameofPlayer").innerText = "";
    card.querySelector("#remplacenPosition").innerText = "";
}
// ------------------------empty----------------------

// ------------------------function info first function----------------------


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

    // positionn
    const positionn = card.querySelector("#remplacenPosition");
    positionn.innerText = "";
    const positionElement = document.createElement("p");
    positionElement.innerText = ` ${playerData.positionPlayer}`;
    positionn.appendChild(positionElement);
    console.log(positionn)



    // Rating
    const ratings = card.querySelector("#ratingss");
    ratings.innerText = "";
    const ratingElement = document.createElement("p");
    ratingElement.innerText = ` ${playerData.rating}`;
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

// ------------------------ end function info first ----------------------
// ------------------------function players----------------------

const positionLabel = document.getElementById('positionLabel');
const positionSelect = document.getElementById('positionPlayer');

addButton.forEach(button => {
    button.addEventListener("click", (event) => {
        currentPosition = event.target.getAttribute("player-post");
        console.log(currentPosition)

        // if (currentPosition === "remplacent1" || currentPosition === "remplacent2" || currentPosition === "remplacent3" || currentPosition === "remplacent4") {
        //     positionLabel.style.display = 'inline';
        //     positionSelect.style.display = 'inline';





        // } else {
        //     positionLabel.style.display = 'none';
        //     positionSelect.style.display = 'none';




        // }
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

    if (currentPosition === "remplacent1" || currentPosition === "remplacent2" || currentPosition === "remplacent3" || currentPosition === "remplacent4") {
      


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
            // supprimer add button
            const addButton = selectedPositionCard.querySelector(".addButton");
            addButton.style.display = "none";

            // add delete et update button
            const deleteButton = document.createElement("button");
            deleteButton.innerText = "";
            // deleteButton.classList.add("deleteButton");
            deleteButton.setAttribute("class", "fa-solid fa-trash addButton")



            selectedPositionCard.appendChild(deleteButton);


            const updateButton = document.createElement("button");
            updateButton.innerText = "";
            // updateButton.classList.add("updatemostapha")
            updateButton.setAttribute("class", "fa-solid fa-pen-to-square addButton")
            selectedPositionCard.appendChild(updateButton)


            // ----------updateButton dtn-----------------------------------------

            updateButton.addEventListener("click", function () {
                const selectedPositionCard = document.getElementById(currentPosition);
                const playerData = getPlayerDataFromCard(selectedPositionCard);


                document.getElementById("name").value = playerData.name
                document.getElementById("photo").value = playerData.photo
                document.getElementById("flag").value = playerData.flag
                document.getElementById("positionPlayer").value = playerData.positionPlayer
                document.getElementById("club").value = playerData.club
                document.getElementById("logo").value = playerData.logo
                document.getElementById("rating").value = playerData.rating
                document.getElementById("pace").value = playerData.pace
                document.getElementById("shooting").value = playerData.shooting
                document.getElementById("passing").value = playerData.passing
                document.getElementById("dribbling").value = playerData.dribbling
                document.getElementById("defending").value = playerData.defending
                document.getElementById("physical").value = playerData.physical

                drawar.style.display = "block";
                updateButton.style.display = "none";
                deleteButton.style.display = "none";



            })

            // ----------delete dtn-------------------
            deleteButton.addEventListener("click", function () {
                const selectedPositionCard = document.getElementById(currentPosition);
                console.log(selectedPositionCard)

                clearCardData(selectedPositionCard);

                const addButton = selectedPositionCard.querySelector(".addButton");
                addButton.style.display = "block";

                deleteButton.style.display = "none";
                updateButton.style.display = "none";

                // id reset form
                // playerForm.reset();

                // drawar.style.display = "none";

            })

            function getPlayerDataFromCard(card) {
                const playerData = {
                    name: card.querySelector("#nameofPlayer").innerText,
                    photo: card.querySelector("#myplayerImage img")?.src || '',
                    flag: card.querySelector("#flagss img")?.src || '',
                    positionPlayer: card.querySelector("#remplacenPosition p")?.innerText || '',
                    club: card.querySelector("#club")?.innerText || '',
                    logo: card.querySelector("#flagss img:nth-child(2)")?.src || '',
                    rating: card.querySelector("#ratingss p")?.innerText.split(":")[1]?.trim() || '',
                    pace: card.querySelector("#statsleft h6:nth-child(1)")?.innerText.split(":")[1]?.trim() || '',
                    shooting: card.querySelector("#statsright h6:nth-child(1)")?.innerText.split(":")[1]?.trim() || '',
                    passing: card.querySelector("#statsright h6:nth-child(2)")?.innerText.split(":")[1]?.trim() || '',
                    dribbling: card.querySelector("#statsleft h6:nth-child(2)")?.innerText.split(":")[1]?.trim() || '',
                    defending: card.querySelector("#statsleft h6:nth-child(3)")?.innerText.split(":")[1]?.trim() || '',
                    physical: card.querySelector("#statsleft h6:nth-child(4)")?.innerText.split(":")[1]?.trim() || ''
                };

                return playerData;
            }


            drawar.style.display = "none";
            playerForm.reset();


        } else {
            alert("Please entrer tout correctly.");
        }


    } else {
      

        if (currentPosition !== playerData.positionPlayer) {
            alert("not same")

        } else {
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
                // supprimer add button
                const addButton = selectedPositionCard.querySelector(".addButton");
                addButton.style.display = "none";

                // add delete et update button
                const deleteButton = document.createElement("button");
                deleteButton.innerText = "";
                // deleteButton.classList.add("deleteButton");
                deleteButton.setAttribute("class", "fa-solid fa-trash addButton")



                selectedPositionCard.appendChild(deleteButton);


                const updateButton = document.createElement("button");
                updateButton.innerText = "";
                // updateButton.classList.add("updatemostapha")
                updateButton.setAttribute("class", "fa-solid fa-pen-to-square addButton")
                selectedPositionCard.appendChild(updateButton)


                // ----------updateButton dtn-----------------------------------------

                updateButton.addEventListener("click", function () {
                    const selectedPositionCard = document.getElementById(currentPosition);
                    const playerData = getPlayerDataFromCard(selectedPositionCard);


                    document.getElementById("name").value = playerData.name
                    document.getElementById("photo").value = playerData.photo
                    document.getElementById("flag").value = playerData.flag
                    document.getElementById("positionPlayer").value = playerData.positionPlayer
                    document.getElementById("club").value = playerData.club
                    document.getElementById("logo").value = playerData.logo
                    document.getElementById("rating").value = playerData.rating
                    document.getElementById("pace").value = playerData.pace
                    document.getElementById("shooting").value = playerData.shooting
                    document.getElementById("passing").value = playerData.passing
                    document.getElementById("dribbling").value = playerData.dribbling
                    document.getElementById("defending").value = playerData.defending
                    document.getElementById("physical").value = playerData.physical

                    drawar.style.display = "block";
                    updateButton.style.display = "none";
                    deleteButton.style.display = "none";



                })

                // ----------delete dtn-------------------
                deleteButton.addEventListener("click", function () {
                    const selectedPositionCard = document.getElementById(currentPosition);
                    console.log(selectedPositionCard)

                    clearCardData(selectedPositionCard);

                    const addButton = selectedPositionCard.querySelector(".addButton");
                    addButton.style.display = "block";

                    deleteButton.style.display = "none";
                    updateButton.style.display = "none";

                    // id reset form
                    // playerForm.reset();

                    // drawar.style.display = "none";

                })

                function getPlayerDataFromCard(card) {
                    const playerData = {
                        name: card.querySelector("#nameofPlayer").innerText,
                        photo: card.querySelector("#myplayerImage img")?.src || '',
                        flag: card.querySelector("#flagss img")?.src || '',
                        positionPlayer: card.querySelector("#remplacenPosition p")?.innerText || '',
                        club: card.querySelector("#club")?.innerText || '',
                        logo: card.querySelector("#flagss img:nth-child(2)")?.src || '',
                        rating: card.querySelector("#ratingss p")?.innerText.split(":")[1]?.trim() || '',
                        pace: card.querySelector("#statsleft h6:nth-child(1)")?.innerText.split(":")[1]?.trim() || '',
                        shooting: card.querySelector("#statsright h6:nth-child(1)")?.innerText.split(":")[1]?.trim() || '',
                        passing: card.querySelector("#statsright h6:nth-child(2)")?.innerText.split(":")[1]?.trim() || '',
                        dribbling: card.querySelector("#statsleft h6:nth-child(2)")?.innerText.split(":")[1]?.trim() || '',
                        defending: card.querySelector("#statsleft h6:nth-child(3)")?.innerText.split(":")[1]?.trim() || '',
                        physical: card.querySelector("#statsleft h6:nth-child(4)")?.innerText.split(":")[1]?.trim() || ''
                    };

                    return playerData;
                }


                drawar.style.display = "none";
                playerForm.reset();


            } else {
                alert("Please entrer tout correctly.");
            }
        }


    }

 
   
});

// ------------------------ end function players----------------------


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

        // none click addGk

        const clickGK = selectedPositionCard.querySelector(".clickGK");
        clickGK.style.display = "none";

        //add delete et update button
        const deleteButton = document.createElement("button");
        deleteButton.innerText = "";
        // deleteButton.classList.add("deleteButton");
        deleteButton.setAttribute("class", "fa-solid fa-trash clickGK")

        selectedPositionCard.appendChild(deleteButton);


        const updateButton = document.createElement("button");
        updateButton.innerText = "";
        // updateButton.classList.add("updateButton")
        updateButton.setAttribute("class", "fa-solid fa-pen-to-square clickGK")

        selectedPositionCard.appendChild(updateButton)

        drawarGK.style.display = "none";
        updateButton.addEventListener("click", function () {
            const selectedPositionCard = document.getElementById(currentPosition);
            const playerData = getPlayerDataFromCard(selectedPositionCard);


            document.getElementById("name").value = playerData.name
            document.getElementById("photo").value = playerData.photo
            document.getElementById("flag").value = playerData.flag
            // document.getElementById("positionPlayer").value = playerData.positionPlayer
            document.getElementById("club").value = playerData.club
            document.getElementById("logo").value = playerData.logo
            document.getElementById("rating").value = playerData.rating
            document.getElementById("reflexes").value = playerData.reflexes
            document.getElementById("speed").value = playerData.speed
            document.getElementById("positioning").value = playerData.positioning
            document.getElementById("diving").value = playerData.diving
            document.getElementById("handling").value = playerData.handling
            document.getElementById("kicking").value = playerData.kicking

            drawarGK.style.display = "block";
            updateButton.style.display = "none";
            deleteButton.style.display = "none";



        })

        // ----------delete dtn-------------------
        deleteButton.addEventListener("click", function () {
            const selectedPositionCard = document.getElementById(currentPosition);
            console.log(selectedPositionCard)

            clearCardData(selectedPositionCard);

            const clickGK = selectedPositionCard.querySelector(".clickGK");
            clickGK.style.display = "block";

            deleteButton.style.display = "none";
            updateButton.style.display = "none";

            // id reset form
            // playerForm.reset();

            drawarGK.style.display = "none";

        })
        function getPlayerDataFromCard(card) {
            const playerData = {
                name: card.querySelector("#nameofPlayer").innerText,
                photo: card.querySelector("#myplayerImage img")?.src || '',
                flag: card.querySelector("#flagss img")?.src || '',
                positionPlayer: card.querySelector("#remplacenPosition p")?.innerText || '',
                club: card.querySelector("#club")?.innerText || '',
                logo: card.querySelector("#flagss img:nth-child(2)")?.src || '',
                rating: card.querySelector("#ratingss p")?.innerText.split(":")[1]?.trim() || '',
                reflexes: card.querySelector("#statsleft h6:nth-child(1)")?.innerText.split(":")[1]?.trim() || '',
                speed: card.querySelector("#statsright h6:nth-child(1)")?.innerText.split(":")[1]?.trim() || '',
                positioning: card.querySelector("#statsright h6:nth-child(2)")?.innerText.split(":")[1]?.trim() || '',
                diving: card.querySelector("#statsleft h6:nth-child(2)")?.innerText.split(":")[1]?.trim() || '',
                handling: card.querySelector("#statsleft h6:nth-child(3)")?.innerText.split(":")[1]?.trim() || '',
                kicking: card.querySelector("#statsleft h6:nth-child(4)")?.innerText.split(":")[1]?.trim() || ''
            };

            return playerData;
        }


        drawar.style.display = "none";
        playerForm.reset();


    } else {
        alert("Please entrer tout correct.");
    }
});

// ------------------------------------ end GK----------------------------------


// ------------------------------------remplacent------------------------------------------------











// ------------------------------------remplacent------------------------------------------------


// --------------helper fonction-----------------------------------------------------------

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
        // positionPlayer: document.getElementById("positionPlayer").value,

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


