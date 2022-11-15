const secret = document.getElementById("secret");   // Secret email
const email = "email.efew@gmail.com";               // Email

function DisplayEmail(session) 
{   
    let userCapcha = document.getElementById("userCapcha"); // Input text
    if (session === userCapcha.value) 
    {
        // Display email
        let emailParagraph = "<p>" + email + "</p>"
        secret.innerHTML += emailParagraph;
    }
}