function CheckPassword() {

    let validateErrors = [];

    var element = document.getElementById("errors");        //select error section

    while (element.firstChild) {                            //remove if any previous errors
        element.removeChild(element.firstChild);
    }

    //nic validation
    let nic  = document.getElementById("nic");
    let usernic = nic.value;
    if(usernic.length != 10 || usernic.charAt(usernic.length - 1) != 'v' && usernic.charAt(usernic.length - 1) != 'V'){
        validateErrors.push("Invalid NIC");
    }
    
    //name validation
    let fname  = document.getElementById("fname");
    let lname  = document.getElementById("lname");
    if(hasNumbers(fname.value)){
        validateErrors.push("Invalid First Name");
    }
    if(hasNumbers(lname.value)){
        validateErrors.push("Invalid Last Name");
    }

    //tel validation
    let tel  = document.getElementById("tel");
    var numbers = /^[0-9]+$/;
    if(tel.value.length != 10 || !tel.value.match(numbers)){
        validateErrors.push("Invalid Telephone Number");
    }

    validateErrors.forEach(error => {                           //view errors
        var tag = document.createElement("p");
        var text = document.createTextNode(error);
        tag.appendChild(text);
        element.appendChild(tag);
    });

    if(validateErrors.length > 0){
        window.scrollTo(500, 0);
        return false;
    }else{
        return true;
    }

}

//is contain number
function hasNumbers(t){
    var regex = /\d/g;
    return regex.test(t);
}  