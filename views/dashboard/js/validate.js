function CheckPassword() {
  console.log('xxx');
  let validateErrors = [];

  var element = document.getElementById("errors"); //select error section

  while (element.firstChild) {
    //remove if any previous errors
    element.removeChild(element.firstChild);
  }

  //location validations
  let center_name = document.getElementById("center_name");
  let district = document.getElementById("district");
  let month = document.getElementById("month");
  let cropType = document.getElementById("cropType");
  let cropVart = document.getElementById("cropVart");

  if (
    center_name.value == "null" ||
    district.value == "null" ||
    month.value == "null" ||
    cropType.value == "null" ||
    cropVart.value == "null"
  ) {
    validateErrors.push("Please check all the filter dropdowns!");
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
