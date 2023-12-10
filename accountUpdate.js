

function isValid(pForm) {
    const id = pForm.id.value;
    const firstName = pForm.firstName.value;
    const lastName = pForm.lastName.value;
    const dob = pForm.dob.value;
    const email = pForm.email.value;
    const phoneNumber = pForm.phoneNumber.value;
    const gender = pForm.gender.value;
    const bloodGroup = pForm.bloodGroup.value;
    const securityQuestion = pForm.securityQuestion.value;

    const idErr = document.getElementById("idErr");
    const firstNameErr = document.getElementById("firstNameErr");
    const lastNameErr = document.getElementById("lastNameErr");
    const dobErr = document.getElementById("dobErr");
    const emailErr = document.getElementById("emailErr");
    const phoneNumberErr = document.getElementById("phoneNumberErr");
    const genderErr = document.getElementById("genderErr");
    const bloodGroupErr = document.getElementById("bloodGroupErr");
    const securityQuestionErr = document.getElementById("securityQuestionErr");

    idErr.innerHTML = "";
    firstNameErr.innerHTML = "";
    lastNameErr.innerHTML = "";
    dobErr.innerHTML = "";
    emailErr.innerHTML = "";
    phoneNumberErr.innerHTML = "";
    genderErr.innerHTML = "";
    bloodGroupErr.innerHTML = "";
    securityQuestionErr.innerHTML = "";

    let flag = true;

    //  id
    if (id === "") {
        idErr.innerHTML = "Enter Your ID Please";
        idErr.style.color = "red";
        flag = false;
    }
    //  first name
    if (firstName === "") {
        firstNameErr.innerHTML = "Enter Your First Name Please";
        firstNameErr.style.color = "red";
        flag = false;
    }

    // last name
    if (lastName === "") {
        lastNameErr.innerHTML = "Enter Your Last Name Please";
        lastNameErr.style.color = "red";
        flag = false;
    }

    //  date of birth
    if (dob === "") {
        dobErr.innerHTML = "Select Your Date of Birth Please";
        dobErr.style.color = "red";
        flag = false;
    }

    //  email
    if (email === "") {
        emailErr.innerHTML = "Enter Your Email Please";
        emailErr.style.color = "red";
        flag = false;
    }

    //  phone number
    if (phoneNumber === "") {
        phoneNumberErr.innerHTML = "Enter Your Phone Number Please";
        phoneNumberErr.style.color = "red";
        flag = false;
    }

    //  gender
    if (gender === "") {
        genderErr.innerHTML = "Select Your Gender Please";
        genderErr.style.color = "red";
        flag = false;
    }

    //  blood group
    if (bloodGroup === "") {
        bloodGroupErr.innerHTML = "Select Your Blood Group Please";
        bloodGroupErr.style.color = "red";
        flag = false;
    }


    // security question
    if (securityQuestion === "") {
        securityQuestionErr.innerHTML = "Enter Your Security Question Please";
        securityQuestionErr.style.color = "red";
        flag = false;
    }


    return flag;

}
