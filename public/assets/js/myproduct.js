
    const editDetailsBtn = document.getElementById('edit_details_btn');
    const profCont = document.getElementById('product_des_view_cont');
    const profEditCont = document.getElementById('product_des_edit_cont');

    editDetailsBtn.addEventListener('click', (e) => {
        profCont.classList.toggle('hide');
        profEditCont.classList.toggle('show');
    });

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('edit_details_btn')) {
            const profCont = e.target.closest('.mycard').querySelector('.product_des_view_cont');
            const profEditCont = e.target.closest('.mycard').querySelector('.product_des_edit_cont');
            profCont.classList.toggle('hide');
            profEditCont.classList.toggle('show');
        }
    });
    

//     It seems like the issue you're facing is that when you create a new item and display it on the screen, 
//     the update button for the previously displayed items does not work as expected. This is likely because 
//     your JavaScript code is only targeting the update button with the ID edit_details_btn, 
//     which might cause conflicts when there are multiple update buttons with the same ID on the page.

//     To fix this issue, you can modify your JavaScript code to target the specific update button 
//     related to the item being edited. One approach is to use classes instead of IDs for the update buttons and 
//     then use event delegation to handle the click event. Here's how you can do it:

//     First, modify your HTML to use classes for the update buttons:

//     html
//     Copy code
//     <button class="edit_details_btn">Update</button>
//     Then, update your JavaScript code to handle the click event using event delegation:

//     javascript
//     Copy code
//     document.addEventListener('click', (e) => {
//     if (e.target.classList.contains('edit_details_btn')) {
//         const profCont = e.target.closest('.mycard').querySelector('.product_des_view_cont');
//         const profEditCont = e.target.closest('.mycard').querySelector('.product_des_edit_cont');
//         profCont.classList.toggle('hide');
//         profEditCont.classList.toggle('show');
//     }
// });
// With this change, when you click on an update button, the JavaScript code will find the closest.
// mycard element (which represents the container for each item) and then find the 
// corresponding .product_des_view_cont and .product_des_edit_cont elements within that container. 
// This ensures that the update button's functionality is scoped to the specific item being edited, 
// avoiding conflicts with other items on the page.