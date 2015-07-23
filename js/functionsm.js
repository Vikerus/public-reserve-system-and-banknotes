function showApps(str) {
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
        xmlhttp.open("GET","includes/appFields.php?apps=applications",true);
        xmlhttp.send();
    }
}
function readApp(str) {
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
				        if (sessionStorage.storedread) {
		var a = xhr.responseText;
		var b = sessionStorage.storedread;
		if (a !== b) {
		sessionStorage.storedread = xhr.responseText;
		}document.getElementById("readapp").innerHTML = sessionStorage.storedread;
        } else {
			var c = xhr.responseText;
            sessionStorage.storedread = c;
		    document.getElementById("readapp").innerHTML = c;
        } 
    }
                //document.getElementById('txtHint5').innerHTML = xhr.responseText;
            }
        }

    // 2. Define what to do when XHR feed you the response from the server - Start

    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('POST', 'includes/appinspector.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("appid="+str);
    // 3. Specify your action, location and Send to the server - End
}
function answerApp() {
    // 1. Create XHR instance - Start
    var vhr;
	var comment = document.getElementById("appid").value;
    if (window.XMLHttpRequest) {
        vhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        vhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }
    // 1. Create XHR instance - End
    
    // 2. Define what to do when XHR feed you the response from the server - Start
    vhr.onreadystatechange = function () {
        if (vhr.readyState === 4) {
            if (vhr.status == 200 && vhr.status < 300) {
								        if (sessionStorage.storedapps) {
		var a = vhr.responseText;
		var b = sessionStorage.storedapps;
		if (a !== b) {
		sessionStorage.storedapps = vhr.responseText;
		}document.getElementById(comment).innerHTML = sessionStorage.storedapps;
        } else {
			var c = vhr.responseText;
            sessionStorage.storedapps = c;
		    document.getElementById(comment).innerHTML = c;
        } 
    } 
            }
        }
   
    // 2. Define what to do when XHR feed you the response from the server - Start

	var appid = document.getElementById("appid").value;
	var answer = document.getElementById("answer").value;
	var ayenay = document.getElementById("ayenay").value;

    // 3. Specify your action, location and Send to the server - Start 
    vhr.open('POST', 'includes/appFields.php');
    vhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    vhr.send("appid=" + appid + "&answer=" + answer + "&ayenay=" + ayenay);
    // 3. Specify your action, location and Send to the server - End
	document.getElementById(comment).innerHTML = sessionStorage.storedapps;
}
