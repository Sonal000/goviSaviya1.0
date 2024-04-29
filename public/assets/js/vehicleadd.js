const v_form = document.getElementById('vehicle_add_form');
const v_brand = document.getElementById('brand');
const v_model = document.getElementById('model');
const v_vehicle_img = document.getElementById('vehicle_img');
const v_year = document.getElementById('year');
const v_milage = document.getElementById('milage');
const v_license_imgs = document.getElementById('license_imgs');
const v_vehicleNo = document.getElementById('vehicleNo');
const v_front_img = document.getElementById('front_img');
const v_back_img = document.getElementById('back_img');
const v_insurance_status = document.getElementById('insurance_status');
const v_ins_expiry = document.getElementById('ins_expiry');
const v_insurance_imgs = document.getElementById('insurance_imgs');
const v_rev_expiry = document.getElementById('rev_expiry');
const v_rev_license_imgs = document.getElementById('rev_license_imgs');
const v_max_vol = document.getElementById('max_vol');
const v_capacity = document.getElementById('capacity');
const listItemBtn = document.getElementById('list_item_btn');
const loader = document.querySelector('.loader_cont');

let isListingItem = false;

const toggleListingState = (state) => {
  if (state) {
    listItemBtn.disabled = true;
    listItemBtn.innerHTML = "Adding...";
    loader.classList.toggle('loader_show');
  } else {
    listItemBtn.disabled = false;
    listItemBtn.innerHTML = "Add Vehicle";
  }
};

v_form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (isListingItem) {
    return;
  }
  inputValidation();
  if (!(
    v_brand.classList.contains('invalid') ||
    v_model.classList.contains('invalid') ||
    v_vehicle_img.classList.contains('invalid') ||
    v_year.classList.contains('invalid') ||
    v_milage.classList.contains('invalid') ||
    v_license_imgs.classList.contains('invalid') ||
    v_vehicleNo.classList.contains('invalid') ||
    v_front_img.classList.contains('invalid') ||
    v_back_img.classList.contains('invalid') ||
    v_insurance_status.classList.contains('invalid') ||
    v_ins_expiry.classList.contains('invalid') ||
    v_insurance_imgs.classList.contains('invalid') ||
    v_rev_expiry.classList.contains('invalid') ||
    v_rev_license_imgs.classList.contains('invalid') ||
    v_max_vol.classList.contains('invalid') ||
    v_capacity.classList.contains('invalid')
  )) {
    isListingItem = true;
    toggleListingState(isListingItem);
    v_form.submit();
  }
});

const setError = (element, message) => {
  element.classList.add('invalid');
  const messageCont = element.nextElementSibling;
  messageCont.innerHTML = message;
};

const setValid = (element) => {
   
  element.classList.remove('invalid');
  const messageCont = element.nextElementSibling;
  messageCont.innerHTML = null;
};

const inputValidation = () => {

  if (v_brand.value.trim() === '') {
    setError(v_brand, "Vehicle brand is required.");
  } else {
    setValid(v_brand);
  }

  if (v_model.value.trim() === '') {
    setError(v_model, "Vehicle model is required.");
  } else {
    setValid(v_model);
  }
/////////////////////////////////////////////////////////////////////////////////////////////////////////
  if (v_vehicle_img.value.trim() === '') {
    setError(v_vehicle_img, "Vehicle image is required.");
  } else {
    setValid(v_vehicle_img);
  }

  if (v_year.value.trim() === '') {
    setError(v_year, "Vehicle year is required.");
  } else if (parseInt(v_year.value) <= 1950) {
    setError(v_year, "The year must be 1950 or later");
  }else if (parseInt(v_year.value)>= 2025) {
    setError(v_year, "The year must be 2024 or earlier.");
  }else {
    setValid(v_year);
  }

  if (v_milage.value.trim() === '') {
    setError(v_milage, "Vehicle milage is required.");
  } else if (parseInt(v_milage.value) <= 0) {
    setError(v_milage, "Mileage must be higher than 0");
  }else{
    setValid(v_milage);
  }

  if (v_license_imgs.value.trim() === '') {
    setError(v_license_imgs, "Driver license images are required.");
  } else {
    setValid(v_license_imgs);
  }
  if (v_vehicleNo.value.trim() === '') {
    setError(v_vehicleNo, "Vehicle number is required.");
  } else {
    setValid(v_vehicleNo);
  }
  if (v_front_img.value.trim() === '') {
    setError(v_front_img, "Vehicle front image is required.");
  } else {
    setValid(v_front_img);
  }
  if (v_back_img.value.trim() === '') {
    setError(v_back_img, "Vehicle back image is required.");
  } else {
    setValid(v_back_img);
  }
  if (v_insurance_status.value.trim() === '') {
    setError(v_insurance_status, "Vehicle insurance status is required.");
  } else {
    setValid(v_insurance_status);
  }
  if (v_ins_expiry.value.trim() === '') {
    setError(v_ins_expiry, "Vehicle insurance expire date is required.");
  } else {
    setValid(v_ins_expiry);
  }
  if (v_insurance_imgs.value.trim() === '') {
    setError(v_insurance_imgs, "Vehicle insurance images are required.");
  } else {
    setValid(v_insurance_imgs);
  }
  if (v_rev_expiry.value.trim() === '') {
    setError(v_rev_expiry, "Vehicle revenue license expire date is required.");
  } else {
    setValid(v_rev_expiry);
  }
  if (v_rev_license_imgs.value.trim() === '') {
    setError(v_rev_license_imgs, "Vehicle revenue license images are required.");
  } else {
    setValid(v_rev_license_imgs);
  }
  if (v_max_vol.value.trim() === '') {
    setError(v_max_vol, "Vehicle maximum volume is required.");
  }else if (parseInt(v_max_vol.value) <= 0) {
    setError(v_max_vol, "Volume must be higher than 0");
  } else {
    setValid(v_max_vol);
  }
  if (v_capacity.value.trim() === '') {
    setError(v_capacity, "Vehicle capacity is required.");
  }else if (parseInt(v_capacity.value) <= 0) {
    setError(v_capacity, "Maximum weight must be higher than 0");
  }  else {
    setValid(v_capacity);
  }
  

};
