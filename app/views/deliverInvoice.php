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
     <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/deliverInvoice.css">
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
					<p class="invoice bold">INVOICE</p>
					<p class="invoice_no">
						<span class="bold">Invoice</span>
						<span>D-<?php echo $data['item_id'];?>/<?php echo $data['id'];?></span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span><?php echo date('Y-m-d', strtotime($data['order']->completed_date)); ?></span>
					</p>
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p>Bill To</p> 
	          		<p class="bold name"><?php echo $data['order']->deliver_name;?></p>
			        <span>
                    <?php echo $data['order']->deliver_address;?><br/>
			           <?php echo $data['order']->deliver_mobile;?>
			        </span>
				</div>
				<div class="total_wrap">
					<p>Buyer:</p>
	          		<p class="bold price"> <?php echo $data['order']->buyer_name;?></p>
                    
                    <?php echo $data['order']->buyer_address;?><br/>
			           <?php echo $data['order']->buyer_mobile;?>
			        </span>
				</div>
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						<div class="col col_no">No.</div>
						<div class="col col_des">ITEM DESCRIPTION</div>
						<div class="col col_price">TYPE</div>
						<div class="col col_qty">DISTANCE</div>
						<div class="col col_total">TOTAL</div>
					</div>
				</div>
				<div class="table_body">
                   
					<div class="row">
						<div class="col col_no">
							<p>01</p>
						</div>
						<div class="col col_des">
							<p class="bold"><?php echo $data['order']->item_name;?></p>
							<p><?php echo $data['order']->quantity;?><?php echo $data['order']->item_unit;?></p>
						</div>
						<div class="col col_price">
							<p><?php echo $data['type'];?></p>
						</div>
						<div class="col col_qty">
							<p>2</p>
						</div>
						<div class="col col_total">
							<p>Rs. <?php echo $data['order']->deliver_fee;?></p>
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
			            <span><?php echo $data['order']->deliver_fee;?></span>
			        </p>
				</div>
			</div>
		</div>
		
	</div>
</div>


</body>
</html>