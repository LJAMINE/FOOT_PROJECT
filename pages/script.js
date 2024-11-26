

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

let myStockLw = document.getElementById("myStockLw")
submitButton.addEventListener("click", function (event) {
    event.preventDefault()

    getData()
   let  li = document.createElement("p")
    li.innerText = arrayTable[7]
    myStockLw.appendChild(li)



    let img = document.createElement("img");
    img.src = arrayTable[3];
    myStockLw.appendChild(img);


    li = document.createElement("p")
    li.innerText = arrayTable[0]
    myStockLw.appendChild(li)



})

// 

//problem baecoup de player ,  alors (for ola for each player , m3a idee ta3 id pour kola player )
