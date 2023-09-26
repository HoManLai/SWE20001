function validate() {

    errMsg = "";
    result = true;

    var memFirst = document.getElementById("memFirst").value;
    var memLast = document.getElementById("memLast").value;
    var phone = document.getElementById("phone").value;
    var streetName = document.getElementById("streetName").value;
    var suburb = document.getElementById("suburb").value;
    var postcode = document.getElementById("postcode").value;
    var dob = document.getElementById("dob").value;

    return result;
}

function init() {
    var submit = document.getElementById("submit");
    submit.onsubmit = validate;
}


window.onload.init();