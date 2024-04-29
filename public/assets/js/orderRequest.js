
const RequestBtn = document.getElementById('request_btn');
const RequestsCont = document.getElementById('accept_order_cont');
const RequestsAddCont = document.getElementById('accept_order_add_cont');
const productname = document.getElementById('product_name');
const requiredstock = document.getElementById('stock');
const reqdate = document.getElementById('expiration_date');
const reqaddress = document.getElementById('req_address');
const loader = document.querySelector('.loader_cont');


RequestBtn.addEventListener('click', (e) => {
    RequestsCont.classList.toggle('hide');
    RequestsAddCont.classList.toggle('show');
}
);

const ReqUpdateBtn = document.getElementById('req_update_btn');
const ReqViewCont = document.getElementById('requests_cont_view');
const ReqEditCont = document.getElementById('requests_cont_edit');

if(ReqUpdateBtn){

    
    ReqUpdateBtn.addEventListener('click', (e) => {
        
        ReqViewCont.classList.toggle('hide');
        ReqEditCont.classList.toggle('show');
    });
}

const form = document.getElementById('request_form');
// const productNameInput = document.getElementById('product_name');
// const unitPriceInput = document.getElementById('unit_price');
// const stockInput = document.getElementById('stock');
// const expDateInput = document.getElementById('expiration_date');
// const pickAddressInput = document.getElementById('pickup_address');
// const itemImgInput = document.getElementById('item_img_input');
// const listItemBtn = document.getElementById('list_item_btn');
// const loader = document.querySelector('.loader_cont');

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
console.log("clicked");
  if (!(
    productname.classList.contains('invalid') ||
    requiredstock.classList.contains('invalid') ||
    reqaddress.classList.contains('invalid') ||
    reqdate.classList.contains('invalid') 
    // pickAddressInput.classList.contains('invalid') ||
    // itemImgInput.classList.contains('invalid')
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
  if (productname.value.trim() === '' ) {
    setError(productname, "Product name is required.");
  } else {
    setValid(productname);
  }

  if (requiredstock.value.trim() === '') {
    setError(requiredstock, "Stock is is required.");
  } else if (parseFloat(requiredstock.value) <= 0) {
    setError(requiredstock, "stock must be greater than 0.");
  } else {
    setValid(requiredstock);
  }

//   if (stockInput.value.trim() === '') {
//     setError(stockInput, "Stock is required.");
//   } else if (parseInt(stockInput.value) <= 0) {
//     setError(stockInput, "Stock must be greater than 0.");
//   } else {
//     setValid(stockInput);
//   }

//   const currentDate = new Date();
//   const req_date = new Date(reqdate.value);
//   if (req_date <= currentDate) {
//     setError(reqdate, "required date must be in the future.");
//   } else {
//     setValid(reqdate);
//   }


if (reqdate.value.trim() === '') {
    setError(reqdate, "required Date is required.");
  } else {
    setValid(reqdate);
  }

  if (reqaddress.value.trim() === '') {
    setError(reqaddress, "required address is required.");
  } else {
    setValid(reqaddress);
  }

//   if (itemImgInput.value.trim() === '') {
//     setError(itemImgInput, "Please upload an image.");
//   } else {
//     setValid(itemImgInput);
//   }
};




