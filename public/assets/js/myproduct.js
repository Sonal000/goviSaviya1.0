
    const editDetailsBtn = document.getElementById('edit_details_btn');
    const profCont = document.getElementById('product_des_view_cont');
    const profEditCont = document.getElementById('product_des_edit_cont');

    editDetailsBtn.addEventListener('click', (e) => {
        profCont.classList.toggle('hide');
        profEditCont.classList.toggle('show');
    });

