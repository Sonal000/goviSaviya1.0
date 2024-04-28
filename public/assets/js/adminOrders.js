$(document).ready(function() {

    

function generatePdf(data_table) {
    // Get orders data
   
    const orders = data_table;

    // Create a new jsPDF instance
    const doc = new jsPDF();

    // Define table headers
    const headers = [['Order ID', 'Customer', 'Order Type', 'Order Status']];

    // Define table data
    const data = orders.map(order => [order.order_id, order.buyer_name, order.order_type, order.order_history]);

    // Add table headers and data to the PDF
    doc.autoTable({ head: headers, body: data });

    // Save the PDF file
    doc.save('orders_report.pdf');
}



// const tabledata = $('#download-btn').data('orders');
// console.log(tabledata);
const tabledata = [{"order_id":122,"order_type":"REQUEST","buyer_id":24,"total_price":40000,"total_delivery_fee":0,"order_history":"pending","order_date":"2024-04-26"}];

$('#download-btn').on('click', function() {

    generatePdf(tabledata);  



});
});