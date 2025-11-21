let hero1 = {
    name : "Augustin",
    hpMax : 18952345695,
    hp : 18952345695,
    atk : 509420156,
    accuracy : 0.7,
    miss : 0,
    critChance : 0.15,
    critDamage : 1.6,
    critCount : 0,
}

let monster1 = {
    name : "Mambo",
    hpMax : 21756941254,
    hp : 21756941254,
    atk : 679413587,
    accuracy : 0.5,
    miss : 0,
    critChance : 0.25,
    critDamage : 1.25,
    critCount : 0,
}

function monsterATK(monster1){
    let damage = monster1.atk;

    // Dodge
    if (Math.random() <= monster1.accuracy) {

        // Crit chance
        if (Math.random() <= monster1.critChance) {
            damage *= monster1.critDamage;
            console.log("Coup critique !");
            monster1.critCount++;
        }

        // Damage apply
        hero1.hp -= damage;
        console.log(hero1.name + " " + hero1.hp + " HP");

    } else {
        console.log(monster1.name + " rate son attaque !");
        monster1.miss++;
    }
}


function heroATK(hero1){
    let damage = hero1.atk;

    // Dodge
    if (Math.random() <= hero1.accuracy) {

        // Crit chance
        if (Math.random() <= hero1.critChance) {
            damage *= hero1.critDamage;
            console.log("Coup critique !");
            hero1.critCount++;
        }

        // Damage apply
        monster1.hp -= damage;
        console.log(monster1.name + " " + monster1.hp + " HP");

    } else {
        console.log(hero1.name + " rate son attaque !");
        hero1.miss++;
    }
}


while (hero1.hp > 0 && monster1.hp > 0){
heroATK(hero1)
console.log("-----")
if (hero1.hp > 0 && monster1.hp > 0) {
    monsterATK(monster1)
}
}

// Verif qui win + set hp 0
    console.log("---------------Win---------------")
if (monster1.hp <= 0){
    let hpPercent = Math.round((hero1.hp / hero1.hpMax) * 100);

    monster1.hp = 0;
    console.log(hero1.name + " win ⭐ (" + hpPercent + "% HP)")
    misscount()

    console.log(hero1.name + " : " +  + "% HP restant");
}
if (hero1.hp <= 0){
    let hpPercent = Math.round((monster1.hp / monster1.hpMax) * 100);
    
    hero1.hp = 0;
    console.log(monster1.name + " win ⭐ (" + hpPercent + "% HP)")
    misscount()
}

function misscount() {
    console.log("---------------Stats---------------")
    console.log(hero1.name + " miss count " + hero1.miss + " 🏃‍♂️")
    console.log(hero1.name + " crit count " + hero1.critCount + " 💫")
    console.log(monster1.name + " miss count " + monster1.miss  + " 🏃‍♂️")
    console.log(monster1.name + " crit count " + monster1.critCount + " 💫")
}


// IA 
// ---- Interface Update -----

document.addEventListener("DOMContentLoaded", () => {

    // Remplir les cartes
    document.getElementById("heroName").textContent = hero1.name;
    document.getElementById("heroHP").textContent = "HP : " + hero1.hp;
    document.getElementById("heroATK").textContent = "ATK : " + hero1.atk;

    document.getElementById("monsterName").textContent = monster1.name;
    document.getElementById("monsterHP").textContent = "HP : " + monster1.hp;
    document.getElementById("monsterATK").textContent = "ATK : " + monster1.atk;

    // Log console → interface
    const logBox = document.getElementById("log");
    const oldLog = console.log;

    console.log = function(msg) {
        oldLog(msg);
        logBox.innerHTML += msg + "<br>";
        logBox.scrollTop = logBox.scrollHeight;
    };
});