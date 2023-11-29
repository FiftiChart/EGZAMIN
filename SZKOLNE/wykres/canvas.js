let wykr = document.getElementById(`myCanvas`)
let pic = wykr.getContext(`2d`);
let tab = sortowanie(liczby());
let kolor = kolory();
// let srednia = AVG(tab);
let dl_w = tab.length*100;
let grubosc = dl_w/(5*tab.length)*2;

function wielkosc(){
  let mina = Math.min(...tab)*(-1)
  let maxa = Math.max(...tab)
  console.log(mina + maxa)
}

wielkosc()
setsize(dl_w,500);

function dra(){
    pic.clearRect(0, 0, wykr.width*0.75, wykr.height);
    pic.lineWidth = 1;
    pic.moveTo(0,0);
    pic.lineTo(0,wykr.height);
    pic.moveTo(0,(wykr.height/2));
    pic.lineTo(wykr.width*0.75,(wykr.height/2));
    pic.stroke();
    pic.lineWidth = grubosc;
    for (let x = 0; x <= tab.length; x++){
        pic.strokeStyle = `rgb(${kolor})`;
      pic.beginPath();
      pic.moveTo(x*(grubosc*1.5)+50, (wykr.height/2));
      if(tab[x] < 0){
        let a = tab[x]*(-1)
        pic.lineTo(x*(grubosc*1.5)+50, wykr.height/2+a*2);
      }
      else{
        pic.lineTo(x*(grubosc*1.5)+50, wykr.height/2-tab[x]*2);
      }
      pic.stroke();
      
    }
}

dra();
// setInterval('dra()', 35);
document.write(`</br>Tablica ma ${tab.length}`);
document.write(`</br>Tablica posiada nastepujace wartosci: ${tab}`);
