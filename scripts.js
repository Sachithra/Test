'use strict'
//View Details
function viewFunction() {
    const element = document.getElementById("hide");
    element.classList.toggle("hidden");
}

//Get Same Value
function copyTextValue() {

    const text1 = document.getElementById("source").value;
    document.getElementById("orderNum").value = text1;
}