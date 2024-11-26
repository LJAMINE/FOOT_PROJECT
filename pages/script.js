

const clickLW = document.getElementById("clickLW");
const closemeButton = document.getElementById("closeme");
const drawer = document.querySelector(".drawar");

clickLW.addEventListener("click", () => {
    drawer.style.display = "block";
});

closemeButton.addEventListener("click", () => {
    drawer.style.display = "none";
});



function getData() {
    let nameInput = document.getElementById("name").value
    let nationality = document.getElementById("nationality").value
    let photo = document.getElementById("photo").value
    let flag = document.getElementById("flag").value
    let positionPlayer = document.getElementById("positionPlayer").value
    let club = document.getElementById("club").value

    let logo = document.getElementById("logo").value
    let rating = document.getElementById("rating").value
    let pace = document.getElementById("pace").value
    let shooting = document.getElementById("shooting").value
    let passing = document.getElementById("passing").value
    let dribbling = document.getElementById("dribbling").value
    let defending = document.getElementById("defending").value
    let physical = document.getElementById("physical").value

    arrayTable = [nameInput, flag, nationality, photo, positionPlayer,club,logo, rating, pace, shooting, passing, dribbling, defending, physical];
    console.log(arrayTable);
    return arrayTable;
}

let nameofPlayer = document.getElementById("nameofPlayer")
let myplayerImage = document.getElementById("myplayerImage")
// let stats = document.getElementById("stats")
let statsRight = document.getElementById("statsRight")
let statsleft = document.getElementById("statsleft")
let ratingss = document.getElementById("ratingss")
let flagss = document.getElementById("flagss")



submitButton.addEventListener("click", function (event) {
    event.preventDefault()

    getData()
    let img = document.createElement("img");
    img.src = arrayTable[3];
    myplayerImage.appendChild(img);


    let li = document.createElement("p")
    li.innerText = arrayTable[0]
    nameofPlayer.appendChild(li)

    li = document.createElement("p")
    li.innerText = `${arrayTable[7]}`
    ratingss.appendChild(li)

    let pace = document.createElement("h6")
    pace.innerText = `PAC:${arrayTable[8]}`
    statsRight.appendChild(pace)

    let shoot = document.createElement("h6")
    shoot.innerText = `SHO:${arrayTable[9]}`
    statsRight.appendChild(shoot)

    let pass = document.createElement("h6")
    pass.innerText = `PAS:${arrayTable[10]}`
    statsRight.appendChild(pass)


    let dribbling = document.createElement("h6")
    dribbling.innerText = `DRI:${arrayTable[11]}`
    statsleft.appendChild(dribbling)

    let defence = document.createElement("h6")
    defence.innerText = `DEF:${arrayTable[12]}`
    statsleft.appendChild(defence)

    let physical = document.createElement("h6")
    physical.innerText = `PHY:${arrayTable[13]}`
    statsleft.appendChild(physical)

   

    let flagcountry = document.createElement("img");
    flagcountry.src = arrayTable[1];
    flagss.appendChild(flagcountry);

    let clubequipe = document.createElement("img");
    clubequipe.src = arrayTable[6];
    flagss.appendChild(clubequipe);

     

})

//

//problem baecoup de player ,  alors (for ola for each player , m3a idee ta3 id pour kola player )
