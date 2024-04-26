const form = document.getElementById('item_list_form');
const productNameInput = document.getElementById('product_name');
const unitPriceInput = document.getElementById('unit_price');
const stockInput = document.getElementById('stock');
const expDateInput = document.getElementById('expiration_date');
const pickAddressInput = document.getElementById('pickup_address');
const itemImgInput = document.getElementById('item_img_input');
const listItemBtn = document.getElementById('list_item_btn');
const loader = document.querySelector('.loader_cont');

let isListingItem = false;

const toggleListingState = (state) => {
  if (state) {
    listItemBtn.disabled = true;
    listItemBtn.innerHTML = "Listing...";
    loader.classList.toggle('loader_show');
  } else {
    listItemBtn.disabled = false;
    listItemBtn.innerHTML = "List Item";
  }
};

form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (isListingItem) {
    return;
  }
  inputValidation();
  if (!(
    productNameInput.classList.contains('invalid') ||
    unitPriceInput.classList.contains('invalid') ||
    stockInput.classList.contains('invalid') ||
    expDateInput.classList.contains('invalid') ||
    pickAddressInput.classList.contains('invalid') ||
    itemImgInput.classList.contains('invalid')
  )) {
    isListingItem = true;
    toggleListingState(isListingItem);
    form.submit();
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
  if (productNameInput.value.trim() === '') {
    setError(productNameInput, "Product name is required.");
  } else {
    setValid(productNameInput);
  }

  if (unitPriceInput.value.trim() === '') {
    setError(unitPriceInput, "Unit price is required.");
  } else if (parseFloat(unitPriceInput.value) <= 0) {
    setError(unitPriceInput, "Unit price must be greater than 0.");
  } else {
    setValid(unitPriceInput);
  }

  if (stockInput.value.trim() === '') {
    setError(stockInput, "Stock is required.");
  } else if (parseInt(stockInput.value) <= 0) {
    setError(stockInput, "Stock must be greater than 0.");
  } else {
    setValid(stockInput);
  }

  const currentDate = new Date();
  const expDate = new Date(expDateInput.value);
  if (expDate <= currentDate) {
    setError(expDateInput, "Expiration date must be in the future.");
  } else {
    setValid(expDateInput);
  }

  if (pickAddressInput.value.trim() === '') {
    setError(pickAddressInput, "Pickup address is required.");
  } else {
    setValid(pickAddressInput);
  }

  if (itemImgInput.value.trim() === '') {
    setError(itemImgInput, "Please upload an image.");
  } else {
    setValid(itemImgInput);
  }
};
