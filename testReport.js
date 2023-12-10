

function isValid(pForm) {
    const testName = pForm.testName.value;
    const testDate = pForm.testDate.value;
    const medicalHistory = pForm.medicalHistory.value;
   
    const testNameErr = document.getElementById("testNameErr");
    const testDateErr = document.getElementById("testDateErr");
    const medicalHistoryErr = document.getElementById("medicalHistoryErr");
    

    testNameErr.innerHTML = "";
    testDateErr.innerHTML = "";
    medicalHistoryErr.innerHTML = "";
    

    let flag = true;

    if (testName === "") {
        testNameErr.innerHTML = "Enter Your testName Please";
        testNameErr.style.color = "red";
        flag = false;
    }

    if (testDate === "") {
        testDateErr.innerHTML = "Enter Old medicalHistory Please";
        testDateErr.style.color = "red";
        flag = false;
    }

    if (medicalHistory === "") {
        medicalHistoryErr.innerHTML = "Enter New medicalHistory Please";
        medicalHistoryErr.style.color = "red";
        flag = false;
    }


    return flag;
}
