// Define your card data (titles and descriptions)
const cardData = [
  {
    title: "Bélier du Sang Ancien",
    description: "On raconte qu’au cœur des montagnes écarlates vit l’esprit d’un bélier millénaire, marqué par les guerres des dieux. Sa corne brisée est devenue le symbole d’un peuple oublié qui scella son essence dans des rituels interdits. Chaque fois qu’un guerrier invoque son pouvoir, le cri du Bélier du Sang Ancien résonne comme un écho de rage et de sacrifice. Certains affirment que vaincre cette créature n’apporte pas seulement des trésors… mais aussi une part de sa malédiction."
  },
  {
    title: "Sneako, le Fripon Ailé",
    description: "On raconte que Sneako est né de la fusion entre l’ombre d’un démon et la basket perdue d’un enfant trop pressé de fuir. Créature espiègle, il ne cherche pas à tuer, mais à te voler ton souffle et tes lacets. Chaque fois qu’il apparaît, on entend un bruit de semelle qui grince, suivi d’un ricanement dans le noir. On dit qu’il provoque les voyageurs en leur lançant des cailloux… puis qu’il s’envole juste hors de portée, laissant derrière lui des chaussures usées comme trophée."
  },
  {
    title: "Drakthar, le Garde-Flamme",
    description: "Drakthar est l’un des derniers dragons-sentinelles, créés par un culte ancien pour garder les passages entre les mondes. Contrairement à ses cousins colossaux, il n’a pas la taille d’une montagne, mais il compense par une ruse carnassière et une flamme noire qui ne s’éteint jamais."
  }
];

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  const cardTitle = document.getElementById("cardTitle");
  const cardDescription = document.getElementById("cardDescription");

  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  // Update the image
  slides[slideIndex - 1].style.display = "block";

  // Update the title and description
  cardTitle.textContent = cardData[slideIndex - 1].title;
  cardDescription.textContent = cardData[slideIndex - 1].description;
}