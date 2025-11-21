function displayHi(name = "Noiro") {
    console.log("Hello mister/miss " + name)
}

displayHi("Mambo")
displayHi("Nig")
displayHi("HOHO¨HOHO")

function opperation(a, b, isAddition) {
    let result = 0;
    if (isAddition) {
        result = a + b;
    } else {
        result = a - b;
    }
    return result;
}

function loop(){
    for (let i = 0; i == 5; i++){
    console.log(i)
}
}
loop()