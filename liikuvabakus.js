var kuulikesed = document.getElementsByClassName("bead");

window.onload = function () {

    for (var i = 0; i < kuulikesed.length; i++) {
        kuulikesed[i].onclick = function () {
            muudakohta(this);
        }
    }

    function muudakohta(kuulikene) {
        if (window.getComputedStyle(kuulikene).getPropertyValue("float") == "left"){
            kuulikene.style.cssFloat = "right";
        } else {
            kuulikene.style.cssFloat = "left";
        }
    }
};