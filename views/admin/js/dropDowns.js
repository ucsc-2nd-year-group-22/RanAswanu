const districtDropdown = document.getElementById("district");
districtDropdown.addEventListener("change", loadCropTypes);
const cropDropdown = document.getElementById("cropType");
cropDropdown.addEventListener("change", loadCropVart);


// function loadDistricts() {
const xhr = new XMLHttpRequest();
const centerDropdown = document.getElementById("center_name");
xhr.open(
  "GET",
  "http://localhost/mvc-ui-embeded/collectingcenter/collectingcentersList/",
  true
);
xhr.onload = function () {
  if (this.status == 200) {
    const centers = JSON.parse(this.responseText);
    let markup = '<option value="null"> -- SELECT COL. CENTER -- </option>';
    for (i in centers) {
      markup +=
        '<option value="' +
        centers[i].center_id +
        '">' +
        centers[i].center_name +
        "</option>";
    }
    centerDropdown.innerHTML = markup;
  }
};
xhr.send();

//load districts
const xhr1 = new XMLHttpRequest();
xhr1.open(
  "GET",
  "http://localhost/mvc-ui-embeded/collectingcenter/getAllDistricts/",
  true
);
xhr1.onload = function () {
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
xhr1.send();

//load months
const xhr2 = new XMLHttpRequest();
const monthDropdown = document.getElementById("month");
xhr2.open(
  "GET",
  "http://localhost/mvc-ui-embeded/collectingcenter/getAllMonths/",
  true
);
xhr2.onload = function () {
  if (this.status == 200) {
    const months = JSON.parse(this.responseText);
    let markup = '<option value="null"> -- SELECT MONTH -- </option>';
    for (i in months) {
      markup +=
        '<option value="' +
        months[i].month_id +
        '">' +
        months[i].month_name +
        "</option>";
    }
    monthDropdown.innerHTML = markup;
  }
};
xhr2.send();

//LOAD CROP TYPES
function loadCropTypes() {
  const cropDropdown = document.getElementById("cropType");
  xhr.open(
    "GET",
    "http://localhost/mvc-ui-embeded/farmer/ajxGetAllCropTypes/" +
      districtDropdown.value,
    true
  );
  xhr.onload = function () {
    if (this.status == 200) {
      const crops = JSON.parse(this.responseText);
      console.log(crops);
      let markup = '<option value="null"> -- SELECT CROP -- </option>';
      for (i in crops) {
        markup +=
          '<option value="' +
          crops[i].crop_id +
          '">' +
          crops[i].crop_type +
          "</option>";
      }
      cropDropdown.innerHTML = markup;
    }
  };
  xhr.send();
}

//LOAD CROP varts
function loadCropVart() {
    const vartDropdown = document.getElementById("cropVart");
    xhr.open(
      "GET",
      "http://localhost/mvc-ui-embeded/farmer/ajxGetCropVartDb/" +
        cropDropdown.value,
      true
    );
    xhr.onload = function () {
      if (this.status == 200) {
        const crops = JSON.parse(this.responseText);
        let markup = '<option value="null"> -- SELECT CROP -- </option>';
        for (i in crops) {
          markup +=
            '<option value="' +
            crops[i].crop_id +
            '">' +
            crops[i].crop_varient +
            "</option>";
        }
        vartDropdown.innerHTML = markup;
      }
    };
    xhr.send();
  }
