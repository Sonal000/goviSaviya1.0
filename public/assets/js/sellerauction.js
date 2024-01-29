const endAucBtn = document.getElementById('end_auc_btn');
    const aucCont = document.getElementById('blur');
    const aucCancleCont = document.getElementById('window_up');

    endAucBtn.addEventListener('click', (e) => {
        aucCont.classList.toggle('hide');
        aucCancleCont.classList.toggle('show');
    });
