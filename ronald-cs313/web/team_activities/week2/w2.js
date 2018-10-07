function displayAlert(){
    alert('The button has been clicked!');
}

function changeColor() {
    var colorIn = document.getElementById("txtColor");

    var divX = document.getElementById("div1");

    var color = colorIn.value;

    divX.style.backgroundColor = color;



}