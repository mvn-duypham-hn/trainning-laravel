function ValidateEmail() {
    var i = 0;
    var result = true;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    var passConfirm = document.getElementById("cfpassword").value;
    const email_regex = /^[a-zA-Z0-9]+[A-Za-z0-9_]*@[a-zA-Z0-9]+\.?[a-zA-Z]{2,3}\.[A-Za-z]{2,3}$/;
    const pass_regex = /^[a-zA-Z0-9]{6,50}$/;
    if (email_regex.test(email) != true) {
        document.getElementById("email_error").innerHTML = "Your email is invalid!";
        i++;
    }
    if (pass_regex.test(pass) != true) {
        document.getElementById("password_error").innerHTML = "Your password is invalid!";
        i++;
    }
    if (passConfirm != pass) {
        document.getElementById("cfpassword_error").innerHTML = "Your password confirm is invalid!";
        i++;
    }
    if (i == 0) {
        result = true;
    } else {
        result = false;
    }
    return result;
}