function CheckPassword() {

    let validateErrors = [];

    var element = document.getElementById("errors");        //select error section

    while (element.firstChild) {                            //remove if any previous errors
        element.removeChild(element.firstChild);
    }
    
    //pwd validation
    let newPw  = document.getElementById("newPw");
    let confPw  = document.getElementById("confPw");
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    
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

function resetPwdValidate(){

    let validateErrors = [];
    console.log('something');
    var element = document.getElementById("errors");

    while (element.firstChild) {                            //remove if any previous errors
        element.removeChild(element.firstChild);
    }

    //pwd validation
    let pwd  = document.getElementById("pwd");
    let pwdRepeat  = document.getElementById("pwdRepeat");
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    
    if(!pwd.value.match(passw)){
        validateErrors.push("Password must include at least Uppsercase, Lowercase and Special Character!");
    }
    if(pwd.value.length < 6){
        validateErrors.push("Password should include at least 6 characters!")
    }
    if(pwd.value != pwdRepeat.value){
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
 