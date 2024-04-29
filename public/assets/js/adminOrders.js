$(document).ready(function() {

   
    










    function convertHTMLtoPDF() {
        const { jsPDF } = window.jspdf;

        let doc = new jsPDF('l', 'mm', [1500, 1400]);
        let pdfjs = document.querySelector('.table_cont');
        doc.html(pdfjs, {
            callback: function(doc) {
                doc.save("orders.pdf");
            },
            x: 12,
            y: 12
        });                
    }            





$('#download-btn').on('click', function() {

    // generatePdf(tabledata);  

    convertHTMLtoPDF();


});
});