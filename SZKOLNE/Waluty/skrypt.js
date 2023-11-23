let aktualne_dane = document.getElementById("aktualne_dane")
let APIurl = "http://api.nbp.pl/api/exchangerates/tables/A/?format=json"



aktualne_dane.addEventListener("click", event=>{
    fetch(APIurl)
    .then(function(Response){
        return Response.json()
    })
    .then(function(data){
        console.log(data[0].rates)
        var xhtml = new XMLHttpRequest
        xhtml.open("POST", "dataupdate.php", true)
        xhtml.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        xhtml.send(JSON.stringify(data[0].rates))
    })
})