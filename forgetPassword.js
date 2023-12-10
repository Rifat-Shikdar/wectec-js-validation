

function isValid(pForm) {
    const email = pForm.email.value;
    const securityQuestion = pForm.securityQuestion.value;

    const emailErr = document.getElementById("emailErr");
    const securityQuestionErr = document.getElementById("securityQuestionErr");

    emailErr.innerHTML = "";
    securityQuestionErr.innerHTML = "";

    let flag = true;

    if (email === "") {
        emailErr.innerHTML = "Enter Your Email Please";
        emailErr.style.color = "red";
        flag = false;
    }


    if (securityQuestion === "") {
        securityQuestionErr.innerHTML = "Enter Your Security Question Please";
        securityQuestionErr.style.color = "red";
        flag = false;
    }
    return flag;
}
