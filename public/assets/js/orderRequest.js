
const RequestBtn = document.getElementById('request_btn');
const RequestsCont = document.getElementById('accept_order_cont');
const RequestsAddCont = document.getElementById('accept_order_add_cont');

RequestBtn.addEventListener('click', (e) => {
    RequestsCont.classList.toggle('hide');
    RequestsAddCont.classList.toggle('show');
}
);

const ReqUpdateBtn = document.getElementById('req_update_btn');
const ReqViewCont = document.getElementById('requests_cont_view');
const ReqEditCont = document.getElementById('requests_cont_edit');

ReqUpdateBtn.addEventListener('click', (e) => {
   
    ReqViewCont.classList.toggle('hide');
    ReqEditCont.classList.toggle('show');
});

