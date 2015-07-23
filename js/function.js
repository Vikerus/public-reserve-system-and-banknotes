function tolerance(str){
	
	sessionStorage.storedTolerance = str;
	
}
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","includes/xmldb.php?itemname="+str,true);
        xmlhttp.send();
    }
}

function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (sessionStorage.storedchest) {
		var a = xmlhttp.responseText;
		var b = sessionStorage.storedchest;
		if (a !== b) {
		sessionStorage.storedchest = xmlhttp.responseText;
		}document.getElementById("txtHint2").innerHTML = sessionStorage.storedchest;
        } else {
			var c = xmlhttp.responseText;
            sessionStorage.storedchest = c;
		    document.getElementById("txtHint2").innerHTML = c;
        } 
                
            }
        }
        xmlhttp.open("GET","includes/vault.php?q="+str,true);
        xmlhttp.send();
		document.getElementById("txtHint2").innerHTML = sessionStorage.storedchest;
    }
}

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint3").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint3").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "includes/exch-list.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showUser3(str) {
    if (str == "") {
        document.getElementById("txtHint4").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (sessionStorage.storedarticles) {
		var a = xmlhttp.responseText;
		var b = sessionStorage.storedarticles;
		if (a !== b) {
		sessionStorage.storedarticles = xmlhttp.responseText;
		}document.getElementById("txtHint4").innerHTML = sessionStorage.storedarticles;
        } else {
			var c = xmlhttp.responseText;
            sessionStorage.storedarticles = c;
		    document.getElementById("txtHint4").innerHTML = c;
        } 
    }
		}
            }
                xmlhttp.open("GET","includes/xmlpostview.php?q="+str,true);
        xmlhttp.send();
		document.getElementById("txtHint4").innerHTML = sessionStorage.storedarticles;
		}


	

function showUser5(str) {
    if (str == "") {
        document.getElementById("txtHint5").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint5").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","includes/xmlcomment.php?q="+str,true);
        xmlhttp.send();
    }
}


function PostData() {
    // 1. Create XHR instance - Start
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }
    // 1. Create XHR instance - End
    
    // 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
				        if (sessionStorage.storedposts) {
		var a = xhr.responseText;
		var b = sessionStorage.storedposts;
		if (a !== b) {
		sessionStorage.storedposts = xhr.responseText;
		}document.getElementById("txtHint5").innerHTML = sessionStorage.storedposts;
        } else {
			var c = xhr.responseText;
            sessionStorage.storedposts = c;
		    document.getElementById("txtHint5").innerHTML = c;
        } 
    }
                //document.getElementById('txtHint5').innerHTML = xhr.responseText;
            }
        }

    // 2. Define what to do when XHR feed you the response from the server - Start

    var userid = document.getElementById("userid").value;
	var postid = document.getElementById("postid").value;

    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('POST', 'includes/userpost.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("userid=" + userid + "&postid=" + postid );
    // 3. Specify your action, location and Send to the server - End
	document.getElementById("txtHint5").innerHTML = sessionStorage.storedposts;
}

function inspectId(str) {
    // 1. Create XHR instance - Start
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }
    // 1. Create XHR instance - End
    
    // 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
				        if (sessionStorage.storedposts) {
		var a = xhr.responseText;
		var b = sessionStorage.storedposts;
		if (a !== b) {
		sessionStorage.storedposts = xhr.responseText;
		}document.getElementById("txtHint3").innerHTML = sessionStorage.storedposts;
        } else {
			var c = xhr.responseText;
            sessionStorage.storedposts = c;
		    document.getElementById("txtHint3").innerHTML = c;
        } 
    }
                //document.getElementById('txtHint5').innerHTML = xhr.responseText;
            }
        }

    // 2. Define what to do when XHR feed you the response from the server - Start

    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('POST', 'includes/idinspector.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("itemid="+str);
    // 3. Specify your action, location and Send to the server - End
}