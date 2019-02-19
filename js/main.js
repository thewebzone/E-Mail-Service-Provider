function update() {
    x = document.getElementById("html");
    if (x.checked) {
        document.getElementById("titel").innerHTML = "Example";
        document.getElementById("voorbeeld").innerHTML = document.getElementById("bericht").value;
    } else {
        document.getElementById("titel").innerHTML = "";
        document.getElementById("voorbeeld").innerHTML = "";
    }
}
