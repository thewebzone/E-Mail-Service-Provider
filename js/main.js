function setHTMLoption (html = false) { 
	if (html == true) {
		document.getElementById("html").checked = true;
		document.getElementById("html-false").checked = false;
		update();
	} else {
			document.getElementById("html").checked = false;
			document.getElementById("html-false").checked = true;
			update();
	}
}
function sendForm( a , n, v, c, form_name ) {
	var send = "";
	for (var i = 0;i < n.length;i++) {
		send += "&"+n[i]+"="+v[i];
	}
	console.log(send);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "E108") {
				swal ("The provided HTML-value is unknown.", "We do not know what went wrong.\nTry to reload the page.", "error");
				return false;
			}
			if (this.responseText == "C305") {
				swal ("That template doesn't exist.", "", "error");
				return false;
			}
			if (this.responseText == "C306") {
				swal ({
					title:"HTML required",
					text: "This template requires that the HTML-option is set to on. Would you like to set your e-mail to HTML?",
					icon:"info",
					buttons: {
						yes: {
							text: "Yes",
							value: true,
						},
						no: {
							text: "No",
							value: false,
						}		
					}
				}).then ((value) => {
					if (value == true) {
						setHTMLoption (true);
						return sendForm( a, n, v, c, form_name );
					}
				});
				return false;
			}
			if (this.responseText == "C307") {
				swal ("You haven't provided all values", "Please, reload the page. If the problem still occurs after you have reloaded the page, send us an e-mail via a for you accessable and working e-mail host.", "warning");
				return false;
			}
			if (this.responseText == "C308") {
				swal ("You should provide an HTML-option", "This happens automaticly. Reload the page. If the problem still occurs after you have reloaded the page, send us an e-mail via a for you accessable and working e-mail host.", "info");
				return false;
			}
			document.getElementById("bericht").value += this.responseText;
	  }
	};
	xmlhttp.open("POST", "template.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("SUBMIT=" + form_name + "&HTML=" + document.getElementById("html").checked + send);
}
function getFormAlerts (i, a, n, v, c, form_name) {
	if (i > c) {
		/*console.table([[n], [v]]);
		console.table([n, v]);*/
		console.log([n, v]);
		sendForm( a , n, v, c, form_name );
		return true;
	}
			console.log(i);
			console.info (swal.getState()["isOpen"]);
			if (swal.getState()["isOpen"] == false) {
				swal(a[i][1], {
						content: "input",
				})
				.then((value) => {
					n[i] = 'var_' + a[i][0];
					v[i] = value;
					console.log(v[i]);
					i++;
					return getFormAlerts (i, a, n, v, c, form_name);
						// swal(`You typed: ${value}`);
				});
				}
}
function update() {
    var x = document.getElementById("html");
    if (x.checked) {
        document.getElementById("titel").innerHTML = "Example";
        document.getElementById("voorbeeld").innerHTML = document.getElementById("bericht").value;
    } else {
        document.getElementById("titel").innerHTML = "";
        document.getElementById("voorbeeld").innerHTML = "";
    }
}

function getForm(form_name) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "C305") {
				swal ("That template doesn't exist.", "", "error");
				return false;
			}
	    var r = JSON.parse(this.responseText), // response is an object
			a = Object.keys(r).map(function(key) { // Make it an array
  				return [key, r[key]];
			});
			console.log(a);
	    var i = 0;
	    var c = a.length,
	    	n = [], // names
	    	v = []; // values
			c = c - 1; // 0 also counts
			console.log(c);
			var s = getFormAlerts (i, a, n, v, c, form_name);
			
	    
	    // console.log(r);
		// console.info(a);
		
	  }
	};
	xmlhttp.open("POST", "template.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("TEMPLATE_FORM=" + form_name);
}