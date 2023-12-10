

function isValid(pForm) {
    const email = pForm.email.value;
    const newPassword = pForm.newPassword.value;
    const confirmNewPassword = pForm.confirmNewPassword.value;

    const emailErr = document.getElementById("emailErr");
    const newPasswordErr = document.getElementById("newPasswordErr");
    const confirmNewPasswordErr = document.getElementById("confirmNewPasswordErr");

    emailErr.innerHTML = "";
    newPasswordErr.innerHTML = "";
    confirmNewPasswordErr.innerHTML = "";

    let flag = true;

    if (email === "") {
        emailErr.innerHTML = "Enter Your Email Please";
        emailErr.style.color = "red";
        flag = false;
    }


    if (newPassword === "") {
        newPasswordErr.innerHTML = "Enter New Password Please";
        newPasswordErr.style.color = "red";
        flag = false;
    }
    if (confirmNewPassword === "") {
        confirmNewPasswordErr.innerHTML = "Re-Enter your Password";
        confirmNewPasswordErr.style.color = "red";
        flag = false;
    }
    return flag;
}
