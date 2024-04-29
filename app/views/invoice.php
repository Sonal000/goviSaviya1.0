<!DOCTYPE html>
<html>
<head>
	
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Orders</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerAdrequest.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/sellerOrder.css">
     <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/invoice.css">
</head>
<body>

<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
                <img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" />
               
					<div class="title_wrap">
						<p class="title bold">Govi Saviya</p>
						<p class="sub_title">Cultivate the bright Future</p>
					</div>
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">Order Bill</p>
					<p class="invoice_no">
						<span class="bold">Invoice ID</span>
						<span> S - <?php echo $data['details']->order_item_id;?>/<?php echo $data['details']->order_id?></span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span><?php echo $data['details']->order_date ;?></span>
					</p>
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p>Bill To</p> 
	          		<p class="bold name"><?php echo $data['details']->buyer_name ;?></p>
			        <span>
			           <?php echo $data['details']->buyer_address ;?>
			        </span>
				</div>
				<div class="total_wrap">
					<p>Deliver</p>
	          		<p class="bold price"><?php echo $data['details']->deliver_name;?></p>
                     
				</div>
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no"></div>
						<div class="col col_des">ITEM DESCRIPTION</div>
						<div class="col col_price">Order_Type</div>
						<div class="col col_qty">Quantity</div>
						<div class="col col_total">TOTAL</div>
					</div>
				</div>
				<div class="table_body">
                 <div class="row">
						<div class="col col_no">
							<p>01</p>
						</div>
						<div class="col col_des">
							<p class="bold"><?php echo $data['details']->name;?></p>
							<p><?php echo $data['details']->description ;?></p>
						</div>
						<div class="col col_price">
							<p><?php echo $data['details']->order_type;?></p>
						</div>
                        <div class="col col_qty">
							<p><?php echo $data['details']->quantity;?> <?php echo $data['details']->unit;?></p>
						</div>
					    <div class="col col_total">
							<p><?php echo $data['details']->total_price;?></p>
						</div>
					</div>
                   

					
				</div>
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold"><img class="nav_img"  src="<?php echo URLROOT ?>/assets/images/govisaviya-bg.png" /></p>
					<p>Cultivate a Brighter Future!</p>
				</div>
				<div class="grandtotal_sec">
			       
			       	<p class="bold">
			            <span>Sub Total</span>
			            <span><?php echo $data['details']->total_price;?></span>
			        </p>
				</div>
			</div>
		</div>
		
	</div>
</div>


</body>
</html>