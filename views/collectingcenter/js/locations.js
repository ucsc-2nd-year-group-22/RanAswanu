const provinceDropdown = document.getElementById("province");

provinceDropdown.addEventListener("change", loadDistricts);

function loadDistricts() {
  const xhr = new XMLHttpRequest();
  const provinceId = document.getElementById("province").value;
  const districtDropdown = document.getElementById("district");

  xhr.open(
    "GET",
    "http://localhost/mvc-ui-embeded/collectingcenter/getDistricts/" +
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
