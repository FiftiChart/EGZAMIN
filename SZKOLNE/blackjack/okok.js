//cards arreys
let cards_orginal = ['2karo.png','2kier.png','2pik.png','2trefl.png',
'3karo.png','3kier.png','3pik.png','3trefl.png',
'4karo.png','4kier.png','4pik.png','4trefl.png',
'5karo.png','5kier.png','5pik.png','5trefl.png',
'6karo.png','6kier.png','6pik.png','6trefl.png',
'7karo.png','7kier.png','7pik.png','7trefl.png',
'8karo.png','8kier.png','8pik.png','8trefl.png',
'9karo.png','9kier.png','9pik.png','9trefl.png',
'10kier.png','10karo.png','10pik.png','10trefl.png',
'Jkaro.png','Jkier.png','Jpik.png','Jtrefl.png',
'Qkaro.png','Qkier.png','Qpik.png','Qtrefl.png',
'Kkaro.png','Kkier.png','Kpik.png','Ktrefl.png',
'Akaro.png','Akier.png','Apik.png','Atrefl.png']
let cards = []
for(let r = 0; r<cards_orginal.length;r+=1){
    cards[r]=cards_orginal[r]
}
//points arreys
let cards_points_orginal = [2,2,2,2,
3,3,3,3,
4,4,4,4,
5,5,5,5,
6,6,6,6,
7,7,7,7,
8,8,8,8,
9,9,9,9,
10,10,10,10,
2,2,2,2,
3,3,3,3,
4,4,4,4,
11,11,11,11]
let cards_points = []
for(let w = 0; w<cards_orginal.length;w+=1){
    cards_points[w]=cards_points_orginal[w]
}

//anwsers for too many points
let anwsers = ["Too much trouble!","Chciwość doprowadziała do zguby!","Przecholowane."]
let game_result = 10

let player_hand = document.getElementsByClassName("player")[0]
let cpu_hand = document.getElementsByClassName("player")[1]
let player_results = document.getElementsByClassName("results")[0]
let cpu_results = document.getElementsByClassName("results")[1]
let game_answer = document.getElementById("game_answer")
let eye_p = document.getElementById("eye_p")
let eye_cpu = document.getElementById("eye_cpu")

let x_card = [0]
let y_card = [0]
for(let s = 0; s<7; s++){
    x_card.push(x_card[s]+26)
    y_card.push(y_card[s]+8)
}

//buttons
let draw_button = document.getElementsByClassName("action")[0]
let pass_button = document.getElementsByClassName("action")[1]
let next_round = document.getElementById("next_round")

//range
let advantage = document.getElementById("advantage")
let i = 0
let round = 0
{
// function draw_a_card(){
//     let a = cards[Math.floor(Math.random()* cards.length)]
//     cards = cards.filter(function (b){
//         return b !== a
//     })
//     return a
// }
}
function draw_a_card(){
    let a = Math.floor(Math.random()* cards.length)
    return a
}
let player_points = 0

draw_button.addEventListener('click', event=>{
    if(pass_button.disabled){
        pass_button.disabled = false
    }
    if(i<7){
        //random number for card and points
        let a = draw_a_card()

        //finding a card
        let card = cards[a]
        cards.splice(a,1)


        //adding points for player
        player_points+=cards_points[a]
        cards_points.splice(a,1)

        //display a card
        player_hand.innerHTML+=`<div class="card" style="top: ${y_card[i]}px;left: ${x_card[i]}px;"><img src="cards/${card}"></div>`
        i++
    }
    else{
        alert("Dobrałeś już maksymalną ilość kart.\nCzas najwyższy wcisnąć pass!")
    }
})


function color(z,k){
    if(z>21){
        k.style.color = "red"
        k.style.background =""
    }
    else if(z == 21){
        k.style.color = "lawngreen"
        k.style.background = "green"
    }
    else{
        k.style.color = "lawngreen"
        k.style.background =""
    }
}


let cpu_points = 0
let announcement = ""
pass_button.addEventListener('click', event=>{
    let s = 0
    round += 1
    while(s == 0 || s==1){
            s = Math.floor(Math.random()*7)
    }
    for(let x = 0; x<s; x++){
        //random number for card and points
        let a = draw_a_card()

        //finding a card
        let card = cards[a]
        cards.splice(a,1)

        //adding points for cpu
        cpu_points+=cards_points[a]
        cards_points.splice(a,1)

        //display a card
        cpu_hand.innerHTML+=`<div class="card" style="top: ${y_card[x]}px;left: ${x_card[x]}px;"><img src="cards/${card}"></div>`
    }

    let player_anwser = ""
    if(player_points>21){
        player_anwser = anwsers[Math.floor(Math.random()* anwsers.length)]
    }
    else if(player_points==21){
        player_anwser = "Oczko!"
        eye_p.innerHTML+="👁"
    }

    color(player_points,player_results)
    player_results.innerHTML = `<br>Twoje punkty: ${player_points}. ${player_anwser}`

    let cpu_anwser = ""
    if(cpu_points>21){
        cpu_anwser = anwsers[Math.floor(Math.random()* anwsers.length)]
    }
    else if(cpu_points==21){
        cpu_anwser = "Oczko!"
        eye_cpu.innerHTML+="👁"
    }

    color(cpu_points,cpu_results)
    cpu_results.innerHTML = `<br>Punkty oponenta: ${cpu_points}. ${cpu_anwser}`

    if(player_points>21){
        if(cpu_points>21){
            game_answer.innerHTML="<p>Potyczka nie została rostrzygnięta.</p>"
        }
        else{
            game_answer.innerHTML=`<p><b>Podsumowanie rundy: ${round}</b><br>Wygrał oponent.</p>`
            game_result+=1
            console.log(advantage.value)
        }
    }else{
        if(player_points==21){
            if(cpu_points==21){
                game_answer.innerHTML="<p>Potyczka nie została rostrzygnięta.</p>"
            }
            else{
                game_answer.innerHTML=`<p><b>Podsumowanie rundy: ${round}</b><br>Wygrałeś!</p>`
                game_result-=1
            }
        }
        else{
            if(player_points<21){
                if(cpu_points>21||cpu_points<player_points){
                    game_answer.innerHTML=`<p><b>Podsumowanie rundy: ${round}</b><br>Wygrałeś!</p>`
                    game_result-=1
                }
                else{
                    if(cpu_points>player_points){
                        game_answer.innerHTML=`<p><b>Podsumowanie rundy: ${round}</b><br>Wygrał oponent.</p>`
                        game_result+=1
                    }
                    game_answer.innerHTML="<p>Potyczka nie została rostrzygnięta.</p>"
                }
            }
        }
    }
    
    advantage.value = game_result
    pass_button.disabled = true
    draw_button.disabled = true
    if(game_result==0){
        game_answer.innerHTML=`<h1><b>Koniec gry.<br>Udało ci się pokonać maszynę w ${round} rundach!</b></h1>`
    }
    else if(game_result==20){
        game_answer.innerHTML=`<h1><b>Koniec gry.<br>Ostatecznie pokonała cię bezduszna maszyna ;( w ${round} rundach.</b></h1>`
    }
    else{
    next_round.style.display = "block"}
})

next_round.addEventListener('click', event=>{
    player_hand.innerHTML = "<p>Twoja łapa.</p>"
    cpu_hand.innerHTML = "<p>Łapa CPU.</p>"
    cpu_points = 0
    player_points = 0
    player_results.innerHTML=""
    cpu_results.innerHTML=""
    draw_button.disabled = false
    next_round.style.display = "none"
    game_answer.innerHTML=""
    i = 0
    for(let r = 0; r<cards_orginal.length;r+=1){
    cards[r]=cards_orginal[r]
    }
    for(let w = 0; w<cards_orginal.length;w+=1){
        cards_points[w]=cards_points_orginal[w]
    }
})