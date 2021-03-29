function CheckPassword() {
  console.log('xxx');
  let validateErrors = [];

  var element = document.getElementById("errors"); //select error section

  while (element.firstChild) {
    //remove if any previous errors
    element.removeChild(element.firstChild);
  }

  // nic validation
  let nic = document.getElementById("nic");
  let usernic = nic.value;
  if (
    (usernic.length != 10 && usernic.length != 12) ||
    (usernic.charAt(usernic.length - 1) != "v" &&
      usernic.charAt(usernic.length - 1) != "V") ||
    hasChar(usernic.substr(0, usernic.length - 1))
  ) {
    validateErrors.push("Invalid NIC");
  }

  //name validation
  let first_name = document.getElementById("first_name");
  let last_name = document.getElementById("last_name");
  if (hasNumbers(first_name.value)) {
    validateErrors.push("Invalid First Name");
  }
  if (hasNumbers(last_name.value)) {
    validateErrors.push("Invalid Last Name");
  }

  //tel validation
  let tel1 = document.getElementById("tel_no_1");
  var numbers = /^[0-9]+$/;
  if (tel1.value.length != 10 || !tel1.value.match(numbers)) {
    validateErrors.push("Invalid Telephone Number(1)");
  }
  let tel2 = document.getElementById("tel_no_2");
  if (tel2.value.length != 0) {
    var numbers = /^[0-9]+$/;
    if (tel2.value.length != 10 || !tel2.value.match(numbers)) {
      validateErrors.push("Invalid Telephone Number(2)");
    }
  }

  //pwd validation for vendors
  let role = document.getElementById("role");
  let password = document.getElementById("password");
  if (role.value == "vendor") {
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (!password.value.match(passw)) {
      validateErrors.push(
        "Password must include at least Uppsercase, Lowercase and Special Character!"
      );
    }
    if (password.value.length < 6) {
      validateErrors.push("Password should include at least 6 characters!");
    }
  }

  //location validations
  let province = document.getElementById("province");
  let district = document.getElementById("district");
  let divSec = document.getElementById("divisional_secratariast");
  let gramaSewa = document.getElementById("gramaSewa");

  if (
    province.value == "null" ||
    district.value == "null" ||
    divSec.value == "null" ||
    gramaSewa.value == "null"
  ) {
    validateErrors.push("Please check all the location dropdowns!");
  }

  validateErrors.forEach((error) => {
    //view errors
    var tag = document.createElement("p");
    var text = document.createTextNode(error);
    tag.appendChild(text);
    element.appendChild(tag);
  });

  if (validateErrors.length > 0) {
    window.scrollTo(500, 0);
    return false;
  } else {
    return true;
  }
}

//is contain number
function hasNumbers(t) {
  var regex = /\d/g;
  return regex.test(t);
}

//is contain non-numeric
function hasChar(t) {
  if (t.match(/[^$,.\d]/)) {
    return true;
  }
}
