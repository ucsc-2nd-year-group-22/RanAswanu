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