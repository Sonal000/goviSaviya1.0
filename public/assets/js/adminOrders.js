$(document).ready(function() {

    

function generatePdf(data_table) {
   
   
    const orders = data_table;
    let temp=orders.map(order =>(order.order_id, order.buyer_id, order.order_type, order.order_history));
    console.log(orders);
    console.log(temp);

    const doc = new jsPDF();

    const headers = [['Order ID', 'Customer', 'Order Type', 'Order Status']];
    const data = orders.map(order => [order.order_id, order.buyer_id, order.order_type, order.order_history]);

   
    doc.autoTable({ head: headers, body: data });

    // Save the PDF file
    doc.save('orders_report.pdf');
}



// const tabledata = $('#download-btn').data('orders');
// console.log(tabledata);
const tabledata = [{"order_id":122,"order_type":"REQUEST","buyer_id":24,"total_price":40000,"total_delivery_fee":0,"order_history":"pending","order_date":"2024-04-26"}];

//  tabledata.map(order => [order.order_id, order.order_type, order.order_date]);
// console.log(tabledata.map(order => [order.order_id, order.order_type, order.order_date]));

$('#download-btn').on('click', function() {

    generatePdf(tabledata);  



});
});