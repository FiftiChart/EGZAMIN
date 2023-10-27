let przycisk = document.getElementById("oblicz")
let rodzaj = document.getElementById("rodzaj")
let litry = document.querySelector("#litry")
let lewy = document.getElementsByClassName("lewy")[0]
let a =0

przycisk.addEventListener("click", event=>{
    if(rodzaj.value == 1){
        a = 4
    }
    if(rodzaj.value == 2){
        a = 3.5
    }
    console.log(a)
    console.log(litry)
    let koszt = 0
    koszt = a*litry.value
    console.log(koszt)
    lewy.innerHTML+=`koszt paliwa: ${koszt} zł`
})