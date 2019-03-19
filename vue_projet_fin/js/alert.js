var formValid = document.getElementById('bouton_envoi');
var pseudo = document.getElementById('pseudo');
var password = document.getElementById('password');
var email = document.getElementById('email');
var misspseudo = document.getElementById('misspseudo');
var misspassword = document.getElementById('misspassword');
var missemail = document.getElementById('missemail');

var pseudoValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
var passwordValid = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})$/;
var emailValid = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

formValid.addEventListener('click', validation);

function validation(event){
    valid(event,pseudo,pseudoValid,misspseudo);
    valid(event,password,passwordValid,misspassword);
    valid(event,email,emailValid,missemail);
}
function valid(event,input,pattern,span){
   if (input.value == ''){
        event.preventDefault();
        span.textContent = 'donnée manquant';
        span.style.color = 'red';
    //Si le format de données est incorrect
    }else if (pattern.test(input.value) == false){
        event.preventDefault();
        span.textContent = 'Format incorrect';
        span.style.color = 'orange';
    }else{ 
    }
} 