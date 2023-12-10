

function isValid(pForm) {
    const email = pForm.email.value;
    const oldPassword = pForm.oldPassword.value;
    const password = pForm.password.value;
    const confirmPassword = pForm.confirmPassword.value;

    const emailErr = document.getElementById("emailErr");
    const oldPasswordErr = document.getElementById("oldPasswordErr");
    const passwordErr = document.getElementById("passwordErr");
    const confirmPasswordErr = document.getElementById("confirmPasswordErr");

    emailErr.innerHTML = "";
    oldPasswordErr.innerHTML = "";
    passwordErr.innerHTML = "";
    confirmPasswordErr.innerHTML = "";

    let flag = true;

    if (email === "") {
        emailErr.innerHTML = "Enter Your Email Please";
        emailErr.style.color = "red";
        flag = false;
    }

    if (oldPassword === "") {
        oldPasswordErr.innerHTML = "Enter Old Password Please";
        oldPasswordErr.style.color = "red";
        flag = false;
    }

    if (password === "") {
        passwordErr.innerHTML = "Enter New Password Please";
        passwordErr.style.color = "red";
        flag = false;
    }

    if (confirmPassword === "") {
        confirmPasswordErr.innerHTML = "Confirm Your Password Please";
        confirmPasswordErr.style.color = "red";
        flag = false;
    } else if (password !== confirmPassword) {
        confirmPasswordErr.innerHTML = "Passwords do not match";
        confirmPasswordErr.style.color = "red";
        flag = false;
    }

    return flag;
}
