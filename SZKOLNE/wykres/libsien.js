//losowanie dowolnych liczb, sterowanie typem zwracanym
function uniRand(min, max=0, strFormat=false, sepComma = false) { //strFormat - dla true zwraca wynik jako string, sepComma - dla true zamienia '.' na ','
    min = parseFloat(min)
    max = parseFloat(max)
    if (isNaN(min) || isNaN(max)) { // a moĹźe sprawdzić czy nie ma rzeczywistych np. -3.456
        console.log('Nieprawidlowa lista argumentow.')
        return false
    }
    else {	
        let temp = min
        min = Math.min(min, max)
        max = Math.max(temp, max)               
        mul = 10**parseInt(Math.max(Number.isInteger(min) ? 0: min.toString().split('.')[1].length, Number.isInteger(max) ? 0 : max.toString().split('.')[1].length))
        min *= mul
        max *= mul
        let result = (Math.trunc(Math.random()*(max - min + 1)) + min) / mul
        return strFormat ? (sepComma ? result.toString().replace('.',',') : result.toString()): result
    }
}

//losowanie liczb caĹkowitych z zadanego przedziaĹu
function randIntFromRange(min_in, max_in) {
max = Math.max(min_in, max_in) //zabezpieczenie na wypadek max_in < min_in
min = Math.min(min_in, max_in)
return Math.trunc(Math.random()*(max - min + 1)) + min
}

//zamiana kÄta podanego w stopniach (angle) na radiany
function angleToRad(angle) {
return Math.PI/180*angle;
}

//ustwienie rozmiaru pola canvas
function setsize(width,height){
    wykr.width = width;
    wykr.height = height;
  }

  function liczby(){
    var i
    let l_calkowite = []
    while (i != 0){
      i = prompt("Podaj liczbe do tablicy","1");
      if (isNaN(i) || i % 1 != 0){
        console.log('Nieprawidlowy argument. Musi byc to liczb a calkowita!')
        return false
      }
      else{
        if(i != 0){
        l_calkowite.push(i)
        }
      }
    }
    return l_calkowite
  }

function sortowanie(l_xd){
    let xd = prompt('Sortowanie: 0 - brak sortowania; 1 - sortowanie rosnaco; 2 - sortowanie malejaco',"0");
    if (xd == 0){//brak
        return l_xd;
    }
    else if (xd == 1){//sort rosnąco
        return l_xd.sort(function(a,b){return a-b})
    }
    else if(xd == 2){//sort malejąco
        return l_xd.sort(function(a,b){return b-a})
    }
}

function kolory(){
    let it_go = prompt("Podaj kolor - (0-255), (0-255), (0-255); Wybierz losowy - 0","0");
    let kol
    if (it_go == 0){
        kol = `${uniRand(255)},${uniRand(255)},${uniRand(255)}`
        return kol
    }
    else{
    return it_go
}
}
//proba sredniej
// function AVG(l_calkowite){
//     let it_be = prompt("Czy chcesz wyswietlic srednia liczb: 1 - tak","1");
//     if (it_be == 1){
//         let srednia
//         for (var i = 0;i <= l_calkowite.length; i++){
//             srednia = srednia + l_calkowite[i]
//         }
//         return srednia/l_calkowite.length

//     }

// }