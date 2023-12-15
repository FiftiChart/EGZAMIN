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
            var valu = {
                nazwa: przyciski[i].innerHTML
            }
            console.log(valu)
            fetch('tablecreate.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(valu),
            })
            .then(response => response.json())
                .then(valu => {
                    console.log('Success:', valu);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        })
        
    }
}
