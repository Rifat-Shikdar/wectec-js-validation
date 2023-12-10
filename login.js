

function isValid(pForm) {
    const email = pForm.email.value;
    const password = pForm.password.value;

    const emailErrMsg = document.getElementById("emailErr");
    const passwordErrMsg = document.getElementById("passErr");
    // const ErrMsg = document.getElementById("ErrMsg");

    emailErrMsg.innerHTML = "";
    passwordErrMsg.innerHTML = "";
    // ErrMsg.innerHTML = "";

    let flag = true;
    if (email === "") {
        emailErrMsg.innerHTML = "Enter Your Email Please";
        emailErrMsg.style.color = "red";
        flag = false;
    }
    if (password === "") {
        passwordErrMsg.innerHTML = "Enter Your Password Please";
        passwordErrMsg.style.color = "red";
        flag = false;
    }
    
   
    return flag;
}
