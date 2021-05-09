var trItems = document.querySelectorAll("main table tr:not(:nth-child(1))");
var popUpLayer = document.querySelector(".layerDim");
var popUpInputItems = document.querySelectorAll(".layerDim .popUp form input");
var modifyBtn = document.querySelector(".layerDim .popUp form #submitBtn");
var closeBtn = document.querySelector(".layerDim .popUp #closeBtn");

modifyBtn.addEventListener('click', () => {
    popUpLayer.style.visibility= "hidden";
});

closeBtn.addEventListener('click',() => {
    popUpLayer.style.visibility="hidden";
})

for(let i = 0; i < trItems.length; i++){
    trItems[i].addEventListener('click',ClickRowItem);
}

function ClickRowItem(){
    popUpLayer.style.visibility= "visible";
    var tableTr = $(this);
    var selectedRow = tableTr.children();
    for(let i = 0; i < popUpInputItems.length; i++){
        popUpInputItems[i].value = selectedRow.eq(i).text();
    }
}