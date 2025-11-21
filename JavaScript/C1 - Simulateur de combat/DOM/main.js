// https://sharemycode.fr/j7z


/* EXO 1 */

const input = document.querySelector('.input');
const text = document.querySelector('.text');

console.log(document);

input.addEventListener("input", function (event) {
    text.innerHTML = input.value;
});


/* EXO 2 */

const image = document.querySelector('.imageClass');

image.addEventListener("click", function () {
    image.src = "https://www.todayifoundout.com/wp-content/uploads/2017/11/rick-astley.png";
})

/* EXO 3 */

const container = document.querySelector('.container');

container.addEventListener("click", function () {
	// AJOUTER UNE CLASSE darkBG D
    container.classList.toggle("darkBG");
})
