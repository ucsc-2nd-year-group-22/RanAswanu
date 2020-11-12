function CheckPassword() {

    let validateErrors = [];

    var element = document.getElementById("errors");        //select error section

    while (element.firstChild) {                            //remove if any previous errors
        element.removeChild(element.firstChild);
    }

    //nic validation
    // let nic  = document.getElementById("nic");
    // let usernic = nic.value;
    // if(usernic.length != 10 || usernic.charAt(usernic.length - 1) != 'v' && usernic.charAt(usernic.length - 1) != 'V'){
    //     validateErrors.push("Invalid NIC");
    // }
    
    //pwd validation
    let newPw  = document.getElementById("newPw");
    let confPw  = document.getElementById("confPw");
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    console.log("something");
    if(!newPw.value.match(passw)){
        validateErrors.push("Password must include at least Uppsercase, Lowercase and Special Character!");
    }
    if(newPw.value.length < 6){
        validateErrors.push("Password should include at least 6 characters!")
    }
    if(newPw.value != confPw.value){
        validateErrors.push("Passwords are not equal, confirm again!")
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
 