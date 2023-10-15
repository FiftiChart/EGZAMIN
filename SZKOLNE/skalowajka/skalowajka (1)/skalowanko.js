
let iv = document.createElement('div')
const zawart = document.createTextNode('Skala:');
iv.appendChild(zawart);
var inputElement = document.createElement("input");
var pElement = document.createElement("p");

iv.appendChild(inputElement);
iv.appendChild(pElement);

inputElement.setAttribute("type", "number");
inputElement.setAttribute("id", "skala");
inputElement.setAttribute("step", "0.01");
inputElement.setAttribute("min", "0.01");
inputElement.setAttribute("max", "2");
inputElement.setAttribute("value", "1.0");
pElement.setAttribute("id", "wymiar");

var firstChild = document.body.firstChild;
iv.classList.add('pasek');
document.body.insertBefore(iv, firstChild);
// iv.innerHTML = `Skala: <input type="number" step="0.01" value="1.0" max="2" min="0.01" id="skala"><p id="wymiar"></p>`

let obraz = document.getElementsByTagName("img")[0]
let skala = document.getElementById("skala")
let wymiar = document.getElementById("wymiar")
let mapka = document.getElementsByTagName("area")
let wartosc = skala.value

let orginal_x = obraz.width
let orginal_y = obraz.height


function pobor(){
    let obrazy = document.getElementsByTagName("img")
    let mapy = document.getElementsByTagName("map")
    let pary = []
    for(let i=0; i<obrazy.length; i++){
        let tempArray = []
        tempArray.push(obrazy[i])
        for(let a=0; a<mapy.length; a++){
            if(obrazy[i].useMap.substr(1)==mapy[a].name){
                tempArray.push(mapy[a])
                pary.push(tempArray)
                break
            }
        }
    }
    console.log(pary)
    return pary
}

function regiony(mapa){
    let regions = mapa.getElementsByTagName("area")
    const orginal = []
    for(let i = 0; i < regions.length; i++){
        const tablica = regions[i].coords.split(",")
        orginal.push(tablica)
    }
    console.log(orginal)
    return orginal
}
let pary = pobor()
for(let i = 0; i < pary.length; i++){
    pary[i].push(regiony(pary[i][1]))
}
console.log(pary)
// let regions_orginal = []
// for()



obraz.height = orginal_y * wartosc
obraz.width = orginal_x * wartosc
wymiar.innerHTML = `${obraz.width} x ${obraz.height}`

console.log(obraz.height, obraz.width)
skala.addEventListener("click", event=>{
    let wartosc = skala.value
    console.log(wartosc)
    obraz.height = orginal_y * wartosc
    obraz.width = orginal_x * wartosc
    console.log(obraz.height, obraz.width)
    wymiar.innerHTML = `${obraz.width} x ${obraz.height}`
    for(let i = 0; i < mapka.length; i++){
        const tablica = mapka[i].coords.split(",")
        for(let a = 0; a < tablica.length; a++){
            tablica[a] = orginal[i][a]*wartosc
        }
        mapka[i].coords = tablica.join(",")
        console.log(mapka[i].coords)
    }
})
console.log(obraz.height, obraz.width)
skala.addEventListener("keyup", event=>{
    let wartosc = skala.value
    console.log(wartosc)
    obraz.height = orginal_y * wartosc
    obraz.width = orginal_x * wartosc
    console.log(obraz.height, obraz.width)
    wymiar.innerHTML = `${obraz.width} x ${obraz.height}`
    for(let i = 0; i < mapka.length; i++){
        const tablica = mapka[i].coords.split(",")
        for(let a = 0; a < tablica.length; a++){
            tablica[a] = orginal[i][a]*wartosc
        }
        mapka[i].coords = tablica.join(",")
        console.log(mapka[i].coords)
    }
})
