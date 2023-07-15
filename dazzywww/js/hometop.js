window.addEventListener("scroll", function() {
    var home = document.getElementById("home");
    var top = window.pageYOffset;

    if (top == 0) {
        home.classList.add("red");
    } else {
        home.classList.remove("red");
    }
});