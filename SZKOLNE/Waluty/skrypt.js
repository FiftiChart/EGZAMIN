let aktualne_dane = document.getElementById("aktualne_dane")
var APIurl = "http://api.nbp.pl/api/exchangerates/tables/A/?format=json"
let przyciski = document.getElementsByClassName("waluta")


if(typeof aktualne_dane === 'undefined' || aktualne_dane === null){

}
else{
    aktualne_dane.addEventListener("click", event=>{
        fetch(APIurl)
        .then(function(response){
            return response.json()
        })
        .then(function(data){
            console.log(data[0].rates)
            var xhtml = new XMLHttpRequest()
            xhtml.open("POST", "dataupdate.php", true)
            xhtml.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            xhtml.send(JSON.stringify(data[0].rates))
        })
        .catch(function(error){
            console.log('Błąd pobierania dnaych z API NBP:',error)
        })
        setTimeout(function(){
            location.reload();
        }, 1000);
    })
}
if(typeof przyciski === 'undefined' || przyciski === null){}
else{

    for(let i = 0; i < przyciski.length; i++){
        przyciski[i].addEventListener("click", event=>{
           console.log(przyciski[i].innerHTML)
           var xhtml2 = new XMLHttpRequest()
           xhtml2.open("POST", "tablecreate.php", true)
           xhtml2.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
           let req = JSON.stringify(przyciski[i].innerHTML) 
           xhtml2.send(req)
        })
        
    }
}
