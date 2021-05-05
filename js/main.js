var loadDocBtn = document.getElementById("loadDoc");
var content = document.getElementById("content");

loadDocBtn.addEventListener("click", clickBtn);



function clickBtn() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callbackFunction(xhttp);
       }
    };
    xhttp.open("GET", "cd_catalog.xml", true);
    xhttp.send();
}

function callbackFunction(xhttp){
    let xmlDoc = xhttp.responseXML;
    let tempArray = xmlDoc.getElementsByTagName("CD");
    let tableContent = "<tr><th>TITLE</th><th>ARTIST</th><th>COUNTRY</th></tr>"
    for(let i = 0; i < tempArray.length; i++){
        let x =tempArray[i].getElementsByTagName("TITLE")[0];
        let y =tempArray[i].getElementsByTagName("ARTIST")[0];
        let z =tempArray[i].getElementsByTagName("COUNTRY")[0];
        tableContent += "<tr>"
        + " <td>" + x.childNodes[0].nodeValue+ "</td>"
        + " <td>" + y.childNodes[0].nodeValue+ "</td>"
        + " <td>" + z.childNodes[0].nodeValue+ "</td>"
        + "</tr>"
    }
    content.innerHTML = tableContent;
}
