function checkForm() {
    // Fetching values from all input fields and storing them in variables.
    var name = document.getElementById("username").value;
    var password = document.getElementById("pwd").value;
    //Check input Fields Should not be blanks.
    if (name == '' || password == '') {
    alert("Fill All Fields");
    } else {
    //Notifying error fields
    var username1 = document.getElementById("uname");
    var password1 = document.getElementById("password");
   
    if (username1.innerHTML == 'Must be 6+ letters' || password1.innerHTML == 'Password too short') {
    alert("Fill Valid Information");
    } else {
    //Submit Form When All values are valid.
    document.getElementById("log").submit();
    }
    }
    }
    // AJAX code to check input field values when onblur event triggerd.
    function validate(field, query) {
    var xmlhttp;
    if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else { // for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
    document.getElementById(field).innerHTML = "Validating..";
    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById(field).innerHTML = xmlhttp.responseText;
    } else {
    document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
    }
    }
    xmlhttp.open("GET", "validation.php?field=" + field + "&query=" + query, false);
    xmlhttp.send();
    }