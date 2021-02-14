const provinceDropdown = document.getElementById("province");
const districtDropdown = document.getElementById("district");
const divSecDropdown = document.getElementById("divisional_secratariast");

provinceDropdown.addEventListener("change", loadDistricts);
districtDropdown.addEventListener("change", loadDivSecs);
divSecDropdown.addEventListener("change", loadGramaSewa);

function loadDistricts() {
  const xhr = new XMLHttpRequest();
  const provinceId = document.getElementById("province").value;
  const districtDropdown = document.getElementById("district");

  xhr.open(
    "GET",
    "http://localhost/mvc-ui-embeded/user/getDistricts/" +
      provinceId,
    true
  );

  xhr.onload = function () {
    if (this.status == 200) {
      const districts = JSON.parse(this.responseText);
      let markup = '<option value="null"> -- SELECT DISTRICT -- </option>';
      for (i in districts) {
        markup +=
          '<option value="' +
          districts[i].district_id +
          '">' +
          districts[i].ds_name +
          "</option>";
      }
      districtDropdown.innerHTML = markup;
    }
  };
  xhr.send();
}

function loadDivSecs() {
    const xhr = new XMLHttpRequest();
    const districtId = document.getElementById("district").value;
    const divSecDropdown = document.getElementById("divisional_secratariast");
  
    xhr.open(
      "GET",
      "http://localhost/mvc-ui-embeded/user/getDivSec/" +
        districtId,
      true
    );
  
    xhr.onload = function () {
      if (this.status == 200) {
        const divSecs = JSON.parse(this.responseText);
        let markup = '<option value="null"> -- SELECT DIVISIONAL SECT. -- </option>';
        for (i in divSecs) {
          markup +=
            '<option value="' +
            divSecs[i].ds_id +
            '">' +
            divSecs[i].ds_name +
            "</option>";
        }
        divSecDropdown.innerHTML = markup;
      }
    };
    xhr.send();
  }

  function loadGramaSewa() {
    const xhr = new XMLHttpRequest();
    const divSecId = document.getElementById("divisional_secratariast").value;
    const gramaSewaDropdown = document.getElementById("gramaSewa");
  
    xhr.open(
      "GET",
      "http://localhost/mvc-ui-embeded/user/getGramaSewa/" +
        divSecId,
      true
    );
  
    xhr.onload = function () {
      if (this.status == 200) {
        const gramaSewas = JSON.parse(this.responseText);
        let markup = '<option value="null"> -- SELECT GRAMASEWA DIV. -- </option>';
        for (i in gramaSewas) {
          markup +=
            '<option value="' +
            gramaSewas[i].gs_id +
            '">' +
            gramaSewas[i].gs_name +
            "</option>";
        }
        gramaSewaDropdown.innerHTML = markup;
      }
    };
    xhr.send();
  }
