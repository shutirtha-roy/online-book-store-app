const name = document.querySelector("#name");
const username = document.querySelector("#username");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#confirm-password");
const locationAddress = document.querySelector("#location");
const formInput = document.querySelector("#form-input");


const alertName = document.querySelector("#alertName");
const alertUsername = document.querySelector("#alertUsername");
const alertEmail = document.querySelector("#alertEmail");
const alertPassword = document.querySelector("#alertPassword");
const alertConfirmPassword = document.querySelector("#alertConfirmPassword");
const alertLocation = document.querySelector("#alertLocation"); 


let nameValue = "";
let usernameValue = "";
let emailValue = "";
let passwordValue = "";
let locationValue = "";


//Regex Pattern
const namePattern = /^[a-zA-Z]+$/;
const userNamePattern = /^.{5,50000000}$/i;
const emailPatten = /\S+@\S+\.\S+/;
const passwordPattern = /^.{5,50}$/i;
const locationPattern = /^.{10,50000000}$/i;


//Alert Message
const alertMessage = {
    Name : "Name must not contain any special characters/number",
    Username: "Username must have more than 5 characters",
    "Email Address": "Must be valid email address with domain such as gmail, yahoo",
    Password : "Password Length must be greater than 5 and less than 50",
    "Confirm Password" : "Password not matched",
    "Location" : "Must have string length greater than 10"
};


let validateInName = (name) => {
    return namePattern.test(name);
}

let validateInUserName = (username) => {
    return userNamePattern.test(username);
}

let validateInEmail = (email) => {
    return emailPatten.test(email);
}

let validateInPassword = (password) => {
    return passwordPattern.test(password);
}

let validateLocation = (location) => {
    return locationPattern.test(location);
}

let validation = (event, inputValue, validationFunction, showAlertMessage, selector) => {
    if(inputValue === "") {
        selector.classList.remove("error");
        selector.classList.remove("success");
        event.textContent = "";
    } else if(!validationFunction(inputValue)) {
        selector.classList.add("error");
        selector.classList.remove("success");
        event.textContent = showAlertMessage;
    } else {
        selector.classList.remove("error");
        selector.classList.add("success");
        event.textContent = "";
    }
}

let nameValidation = (name) => {
    validation(alertName, name, validateInName, alertMessage.Name, document.querySelector("#name"));
}

let userNameValidation = (username) => {
    validation(alertUsername, username, validateInUserName, alertMessage.Username, document.querySelector("#username"));
}

let emailValidation = (email) => {
    validation(alertEmail, email, validateInEmail, alertMessage["Email Address"], document.querySelector("#email"));
}

let passwordValidation = (password) => {
    validation(alertPassword, password, validateInPassword, alertMessage.Password, document.querySelector("#password"));
}

let locationValidation = (location) => {
    validation(alertLocation, location, validateLocation, alertMessage.Location, document.querySelector("#location"));
}

let confirmPasswordValidation = (passwordValue, confirmPasswordValue, selector) => {
    
    if(confirmPasswordValue === "") {
        selector.classList.remove("error");
        selector.classList.remove("success");
        alertConfirmPassword.textContent = "";
    } else if(passwordValue !== confirmPasswordValue) {
        selector.classList.add("error");
        selector.classList.remove("success");
        alertConfirmPassword.textContent = alertMessage["Confirm Password"];
    } else {
        selector.classList.remove("error");
        selector.classList.add("success");
        alertConfirmPassword.textContent = "";
    }
}


let checkAllValidation = (nameValue, usernameValue, emailValue, passwordValue, confirmPasswordValue, locationValue) => {
    nameValidation(nameValue);
    userNameValidation(usernameValue);
    emailValidation(emailValue);
    passwordValidation(passwordValue);
    confirmPasswordValidation(passwordValue, confirmPasswordValue, document.querySelector("#confirm-password"));
    locationValidation(locationValue);
}


formInput.addEventListener("keyup", (event) => {
    nameValue = name.value;
    usernameValue = username.value;
    emailValue = email.value;
    passwordValue = password.value;
    confirmPasswordValue = confirmPassword.value;
    locationValue = locationAddress.value;

    checkAllValidation(nameValue, usernameValue, emailValue, passwordValue, confirmPasswordValue, locationValue);  
})