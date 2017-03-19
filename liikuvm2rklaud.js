window.onload = function () {
	var m2rklaud = document.getElementById("esimenestiil");

	function uuskoht(liigutalauda) {
		var uusX = String(Math.floor(Math.random()*100))+"%";
        var uusY = String(Math.floor(Math.random()*100))+"%";
        liigutalauda.style.left = uusX;
        liigutalauda.style.top = uusY;
    }

    m2rklaud.onclick = function () {
        uuskoht(this);
    }
};