const email = document.querySelector("#email");
const password = document.querySelector("#password");
const loginFormInput = document.querySelector("#login-form-input");
const alertEmail = document.querySelector("#alertEmail");
const alertPassword = document.querySelector("#alertPassword");

let emailValue = "";
let passwordValue = "";


//Regex Pattern
const emailPatten = /\S+@\S+\.\S+/;
//const passwordPattern = /^([a-zA-Z0-9_-]?@){5,50}$/;
const passwordPattern = /(.*?){5,50}/;


//Alert Message
const alertMessage = {
    "Email Address": "Must be valid email address with domain such as gmail, yahoo",
    Password : "Password Length must be greater than 5 and less than 50",
};



let validateInEmail = (email) => {
    return emailPatten.test(email);
}

let validateInPassword = (password) => {
    return passwordPattern.test(password);
}



let validation = (event, inputValue, validationFunction, showAlertMessage) => {
    if(inputValue === "") {
        event.textContent = "";
    } else if(!validationFunction(inputValue)) {
        event.textContent = showAlertMessage;
    } else {
        event.textContent = "";
    }
}


let emailValidation = (email) => {
    validation(alertEmail, email, validateInEmail, alertMessage["Email Address"]);
}

let passwordValidation = (password) => {
    validation(alertPassword, password, validateInPassword, alertMessage.Password);
}



let checkIfInputNotEmpty = (values) => {
    values.forEach(item => {
        
        if(item === "") {
            return false;
        } else {
            return true;
        }
    });
}

let checkLoginValidation  = (emailValue, passwordValue) => {
    emailValidation(emailValue);
    passwordValidation(passwordValue);
}


loginFormInput.addEventListener("keyup", (event) => {
    emailValue = email.value;
    passwordValue = password.value;

    checkLoginValidation(emailValue, passwordValue);  
})