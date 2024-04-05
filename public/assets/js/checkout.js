const form = document.getElementById("placeOrderForm");
// const nameInput = document.getElementById('name');
// const emailInput = document.getElementById('email');
const mobileInput = document.getElementById("mobile");
const addressInput = document.getElementById("address");
const cityInput = document.getElementById("city");
const postalInput = document.getElementById("postalCode");
const orderReq = document.querySelector(".order_req");
const cartItem = document.querySelectorAll(".item");
const subvalue = document.querySelector(".subvalue");
const totvalue = document.querySelector(".totvalue");

// count total
let total = 0;
cartItem.forEach((el) => {
  const price = el.dataset.price;
  const qty = el.dataset.qty;
  total = total + price * qty;
});

if (subvalue) {
  subvalue.innerHTML = total;
}
total=total+totvalue.dataset.delivery*1;
if (totvalue) {
  totvalue.innerHTML = total;
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("submit");
  inputValidation();
  console.log("submit test");

  if (
    !(
      mobileInput.classList.contains("invalid") ||
      addressInput.classList.contains("invalid") ||
      cityInput.classList.contains("invalid") ||
      postalInput.classList.contains("invalid")
    )
  ) {
    form.submit();
  }
});

const setError = (element, message) => {
  element.classList.add("invalid");
  messageCont = element.nextElementSibling;
  messageCont.innerHTML = message;
  orderReq.innerHTML = "Fill out all the required feilds !";
};
const setValid = (element) => {
  element.classList.remove("invalid");
  messageCont = element.nextElementSibling;
  messageCont.innerHTML = null;
};

const inputValidation = () => {
  const addressValue = addressInput.value.trim();
  const cityValue = cityInput.value.trim();
  const mobileValue = mobileInput.value.trim();
  const postalValue = postalInput.value.trim();

  if (addressValue === "") {
    setError(addressInput, "Address is required.");
  } else {
    setValid(addressInput);
  }
  if (cityValue === "") {
    setError(cityInput, "City is required.");
  } else {
    setValid(cityInput);
  }

  const isValidMobileNumber = /^\d{10}$/;

  if (mobileValue === "") {
    setError(mobileInput, "Mobile number is required.");
  } else if (mobileValue.length !== 10) {
    setError(mobileInput, "Mobile number must be exactly 10 digits.");
  } else if (!isValidMobileNumber.test(mobileValue)) {
    setError(mobileInput, "Mobile number is not valid.");
  } else {
    setValid(mobileInput);
  }

  const isValidPostalCode = /^\d+$/;

  if (postalValue === "") {
    setError(postalInput, "Postal Code is required.");
  } else if (postalValue.length < 4) {
    setError(postalInput, "Valid Postal Code is required.");
  } else if (!isValidPostalCode.test(postalValue)) {
    setError(postalInput, "Postal Code is not valid.");
  } else {
    setValid(postalInput);
  }
};

