var mainImg = document.getElementById("main-img");
var smallImg = document.getElementsByClassName("small-img");

smallImg[0].onclick = function () {
    mainImg.src = smallImg[0].src
};

smallImg[1].onclick = function () {
    mainImg.src = smallImg[1].src
};


smallImg[2].onclick = function () {
    mainImg.src = smallImg[2].src
};


smallImg[3].onclick = function () {
    mainImg.src = smallImg[3].src
};


// const mainImg = document.querySelector("main-img");
// const smallImg = document.querySelectorAll("small-img");

// smallImg.forEach((img) => {
//     img.addEventListener('click', () => {
//         mainImg.src = img.src
//     });
// });