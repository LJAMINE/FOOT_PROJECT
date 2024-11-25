

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

    arrayTable = [nameInput, flag, nationality, photo, positionPlayer, club, logo, rating, pace, shooting, passing, dribbling, defending, physical];
    console.log(arrayTable);
    return arrayTable;
}

let stockLW = document.getElementById("stockLW")
submitButton.addEventListener("click", function (event) {
    event.preventDefault()

    getData()
    li = document.createElement("p")
    li.innerText = arrayTable[7]
    stockLW.appendChild(li)



    let img = document.createElement("img");
    img.src = arrayTable[3];
    stockLW.appendChild(img);


    li = document.createElement("p")
    li.innerText = arrayTable[0]
    stockLW.appendChild(li)



})

let stockST = document.getElementById("stockST")
submitButton.addEventListener("click", function (event) {
    event.preventDefault()

    getData()
    li = document.createElement("p")
    li.innerText = arrayTable[7]
    stockST.appendChild(li)



    let img = document.createElement("img");
    img.src = arrayTable[3];
    stockST.appendChild(img);


    li = document.createElement("p")
    li.innerText = arrayTable[0]
    stockST.appendChild(li)



})

//problem baecoup de player , for alors (for ola for each player , m3a idee ta3 id pour kola player )
