let kostka = document.getElementById("kostki")
let caly = document.getElementsByClassName("caly")[0]
let prawy = document.getElementsByClassName("prawy")[0]
let losowanie = 0
let los = document.getElementById("los")
let nr_los = document.getElementById("nr_los")
let wynik = document.getElementById("wynik")
let one = document.getElementById("one")
let two = document.getElementById("two")
let three = document.getElementById("three")
let four = document.getElementById("four")
let five = document.getElementById("five")
let six = document.getElementById("six")
let przycisk = document.getElementById("przycisk")
let hista = document.getElementsByClassName("hista")[0]

kostka.addEventListener("mouseover", event=>{
    kostka.src = "kostka_ani.gif"
})

kostka.addEventListener("mouseout", event=>{
    kostka.src = "kostka_def.gif"
})

kostka.addEventListener("click", event=>{
    let liczba = Math.random()*6
    liczba = Math.floor(liczba)+1
    losowanie += 1
    caly.style.visibility = "visible"
    przycisk.style.visibility = "visible"
    los.innerHTML = `${losowanie})`
    nr_los.innerHTML+=`<th>${losowanie}</th>`
    wynik.innerHTML+=`<td>${liczba}</td>`
    if(liczba == 1){
        one.innerHTML = parseInt(one.innerHTML)+1
        kostka.src="kostka1.jpg"
    }
    if(liczba == 2){
        two.innerHTML = parseInt(two.innerHTML)+1
        kostka.src="kostka2.jpg"
    }
    if(liczba == 3){
        three.innerHTML = parseInt(three.innerHTML)+1
        kostka.src="kostka3.jpg"
    }
    if(liczba == 4){
        four.innerHTML = parseInt(four.innerHTML)+1
        kostka.src="kostka4.jpg"
    }
    if(liczba == 5){
        five.innerHTML = parseInt(five.innerHTML)+1
        kostka.src="kostka5.jpg"
    }
    if(liczba == 6){
        six.innerHTML = parseInt(six.innerHTML)+1
        kostka.src="kostka6.jpg"
    }
    hista.innerHTML += prawy.innerHTML
})
let pokaz = true
przycisk.addEventListener("click", event=>{
    if(pokaz){
        hista.style.visibility = "visible"
        przycisk.innerHTML = "Schowaj historię"
        pokaz = false
    }
    else{
        hista.style.visibility = "hidden"
        przycisk.innerHTML = "Pokaż historię"
        pokaz = true
    }
    

})




