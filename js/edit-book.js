const name = document.querySelector("#name");
const authorName = document.querySelector("#author_name");
const description = document.querySelector("#description");
const price = document.querySelector("#price");
const totalBooks = document.querySelector("#total_products");
const editFormInput = document.querySelector("#edit-form");


const alertName = document.querySelector("#alertName");
const alertAuthorName = document.querySelector("#alertAuthorName");
const alertDescription = document.querySelector("#alertDescription");
const alertPrice = document.querySelector("#alertPrice");
const alertTotalProducts = document.querySelector("#alertTotalProducts");



let nameValue = "";
let authorNameValue = "";
let descriptionValue = "";
let priceValue = "";
let totalBooksValue = "";


//Regex Pattern
const namePattern = /^[a-zA-Z\s]+$/;
const authorNamePattern = /^[a-zA-Z\s]+$/;
const descriptionPatten = /^.{10,500000000}$/i;
const pricePattern = /^[1-9]+[0-9]*$/i;
const totalBooksPattern = /^[1-9]+[0-9]*$/i;


//Alert Message
const alertMessage = {
    Name : "Name must not contain any special characters/number",
    AuthorName : "Author Name must not contain any special characters/number",
    "description Address": "Must have string length more than 10",
    Price : "price length must be greater than 0 Taka",
    TotalBooks : "Total Books must be greater than 0"
};

let validateInName = (name) => {
    return namePattern.test(name);
}

let validateInAuthorName = (authorName) => {
    return authorNamePattern.test(authorName);
}

let validateIndescription = (description) => {
    return descriptionPatten.test(description);
}

let validateInprice = (price) => {
    return pricePattern.test(price);
}

let validateIntotalBooks = (totalBooks) => {
    return totalBooksPattern.test(totalBooks);
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

let authorNameValidation = (authorName) => {
    validation(alertAuthorName, authorName, validateInAuthorName, alertMessage.AuthorName, document.querySelector("#author_name"));
}

let descriptionValidation = (description) => {
    validation(alertDescription, description, validateIndescription, alertMessage["description Address"], document.querySelector("#description"));
}

let priceValidation = (price) => {
    validation(alertPrice, price, validateInprice, alertMessage.Price, document.querySelector("#price"));
}

let totalBooksValidation = (totalBooks) => {
    validation(alertTotalProducts, totalBooks, validateIntotalBooks, alertMessage.TotalBooks, document.querySelector("#total_products"));
}

let checkBookValidation  = (nameValue, authorNameValue, descriptionValue, priceValue, totalBooksValue) => {
    nameValidation(nameValue);
    authorNameValidation(authorNameValue);
    descriptionValidation(descriptionValue);
    priceValidation(priceValue);
    totalBooksValidation(totalBooksValue);
}


editFormInput.addEventListener("keyup", (event) => {
    nameValue = name.value;
    authorNameValue = authorName.value;
    descriptionValue = description.value;
    priceValue = price.value;
    totalBooksValue = totalBooks.value

    checkBookValidation(nameValue, authorNameValue, descriptionValue, priceValue, totalBooksValue);  
})