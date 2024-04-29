const v_form = document.getElementById('vehicle_add_form');
const v_ins_expiry = document.getElementById('ins_expiry');
const v_insurance_imgs = document.getElementById('insurance_imgs');
const v_rev_expiry = document.getElementById('rev_expiry');
const v_rev_license_imgs = document.getElementById('rev_license_imgs');

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
    listItemBtn.innerHTML = "Done";
  }
};

v_form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (isListingItem) {
    return;
  }
  inputValidation();
  if (!(
    v_ins_expiry.classList.contains('invalid') ||
    v_insurance_imgs.classList.contains('invalid') ||
    v_rev_expiry.classList.contains('invalid') ||
    v_rev_license_imgs.classList.contains('invalid')
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
    console.log(element);
  element.classList.remove('invalid');
  const messageCont = element.nextElementSibling;
  messageCont.innerHTML = null;
};

const inputValidation = () => {

 

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

};
