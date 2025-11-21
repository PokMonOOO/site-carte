// user 

let userName = "Jean"
let userMoney = 15

const produit1Name = "White person"
const produit1Price = 2
let produit1Quantity = 1667

let produit2 = {
    produit2Name : "Chien",
    produit2Price : 15,
    produit2Quantity : 67,
}

let buyingCount1 = 0

function buyWhitePerson() {
    userMoney -= produit1Price;
    produit1Quantity --;
    buyingCount1 ++

    console.log(userName + " à " + userMoney + " restant sur son compte")
    console.log("Il reste " + produit1Quantity + " pour le produit " + produit1Name)
}

while (userMoney >= produit1Price && produit1Quantity > 0) {
    buyWhitePerson()
}
console.clear

// ex2 

let fruits = [`pomme`, `banana`, `nigg`]

fruits.forEach(function(fruits) {
    console.log(fruits)
})

console.log(fruits.length)

for (let i = 0; i < fruits.length; i++) {
    console.log(fruits[i])
}



fruits.push("Mambo")
console.log(fruits)
fruits.pop()

let Mambo = {
    MamboRouge : 5,
    MamboVert : 5,
    MamboJaune : 10,
}

console.clear
console.log(Mambo)


console.log("Il y a " + MamboTotal)