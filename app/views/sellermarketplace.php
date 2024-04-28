
<?php
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="icon" href="<?php echo URLROOT ?>/assets/images/govisaviya-bg.ico" type="image/x-icon">
    <link
 rel="stylesheet"
 href="<?php echo URLROOT ?>/assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>/assets/css/sellermarketplace.css">
</head>
<body>
<?php

// valid params
$validParamsPag =['category','sort','order','minPrice','maxPrice','city','minQty','maxQty','search'];
$validParamsSort =['category','minPrice','maxPrice','city','minQty','maxQty','search'];


// paramsFunction
function paramString($validParams){
  $queryParams = $_GET;
  foreach ($queryParams as $param => $value) {
     if (!in_array($param, $validParams)) {
        unset($queryParams[$param]);
      }
  }


  $paramString = http_build_query($queryParams);
  return $paramString;
}



 require APPROOT. '/views/layouts/navbar2.php'; 
 ?>

<div class="main_container">
  
  <?php 
   require APPROOT. '/views/layouts/sellerSidebar.php';  ?>

<!-- items -->
<div class="container_content">
  
  <div class="container_title_cont">
  <p class="container_title">Marketplace</p>
  </div>
  

 
  <div class="marketplace_container_main">
     <!-- search bar ========================= -->
     <section class="searchbar_section">


     <div class="searchbar_cont ">

      <div class="search_cont">
      <div class="searchbar">
        <form id="searchForm">
     <input class="search" placeholder="Search for Products"  name="search" value="<?php echo $data['search_term'] ?>" />
     <button class="search_btn" type="submit" id="search_btn">
      <i class="fas fa-search search_icon"></i>
     </button>
     </form>
    </div>
    <div class="searchbar_btn_cont">
  <button class="listing_btn active" id="listing_btn">Listings</button>
  <button class="auction_btn" id="auction_btn">Auction</button>
 </div>
      </div>

  </div>

 </section>
 <!-- search bar ========================== -->

 <div class="path_container">
     <!-- search words=========== -->
 <?php if($data['search_term']){
   ?>
  <div class="search_terms_cont">
    <p class="search_title">Results for </p>
    <p class="search_term"> <?php echo $data['search_term']; ?></p>
  </div>
  <?php
 } ?>
 <!-- search words end=========== -->
  <div class="path_section">
    <div class="path_cont">
     
    <!-- <p>marketplace > </p> -->
    <?php 
   
      if($data['category']){
        foreach($data['category'] as $cat){
          echo "<p class='path_item'>$cat</p>";
        }
      }
      if($data['city']){
        foreach($data['city'] as $city){
          echo "<p class='path_item'>$city</p>";
        }
      }
      if($data['priceRange']){
        echo "<p class='path_item'>{$data['priceRange']}</p>";
      }
      if($data['qtyRange']){
        echo "<p class='path_item'>{$data['qtyRange']}</p>";
      }
  
      ?>
    </div>
    <div class="sort_cont">
      <p>Sort by: </p>
      <?php  $params =paramString($validParamsSort); ?>
      <button class="sorting_btn" id="sorting_btn"><span class="sorting_btn_txt" id="sorting_btn_txt">sorting</span><i class="fas fa-chevron-down"></i></button>
      <div class="expand_sorting hide_expand_sorting" id="expand_sorting">
      <ul>
      <li>
        <a href="?sort=created_at&order=desc<?php echo '&'.$params ?>" class="sorting_item">
          Newest
          <i class="fas fa-check sorting_check"></i>
        </a>
      </li>
      <li>
        <a href="?sort=price&order=desc<?php echo '&'.$params ?>" class="sorting_item">
          Highest Price
          <i class="fas fa-check sorting_check"></i>
        </a>
      </li>
      <li>
        <a href="?sort=price&order=asc<?php echo '&'.$params ?>" class="sorting_item">
          Lowest Price
          <i class="fas fa-check sorting_check"></i>
        </a>
      </li>
      <li>
        <a href="?sort=stock&order=desc<?php echo '&'.$params ?>" class="sorting_item">
          Highest Stock
          <i class="fas fa-check sorting_check"></i>
        </a>
      </li>
      <li>
        <a href="?sort=stock&order=asc<?php echo '&'.$params ?>" class="sorting_item">
          Lowest Stock
          <i class="fas fa-check sorting_check"></i>
        </a>
      </li>
    </ul>
      </div>
    </div>
  </div>

</div>


<div class="marketplace_container_sidebar">
    <!--  sidebar section===================== -->

 <section>
   <div class="sidebar" id="sidebar_filter">
    <!-- ======================== -->
    <article class="card-group-item">
      <form id="categoryForm" class="filter_form">
      <div class="filter_title">
     <h5>Categories</h5>
     <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </div>
    <button class="filter_btn_expand">
    <h5>Categories</h5>
      <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </button>
		<div class="filter_content ">
			<div class="card_body">
				<!-- <label class="form_check">
				  <input class="form-check-input" type="checkbox" name="category" value="all">
				  <span class="form-check-label">
				   All
				  </span>
				</label>  -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="vegetables" name="category">
				  <span class="form-check-label">
				    Vegetables
				  </span>
				</label> <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="fruits" name="category">
				  <span class="form-check-label">
				    Fruits
				  </span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="spices" name="category">
				  <span class="form-check-label">
				    Spices
				  </span>
				</label>  <!-- form-check.// -->
        
			</div> <!-- card-body.// -->
      <div class="filter_btn_cont">
        <!--apply  button for categorus-->
        <input type="submit" class="btn apply_btn" value="Apply" id="apply_category">
      </div>
    </div>
  </form>
  <form id="cityForm" class="filter_form">
      <div class="filter_title">
     <h5>Close by</h5>
     <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </div>
    <button class="filter_btn_expand">
    <h5>Close by</h5>
      <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </button>
		<div class="filter_content ">
			<div class="card_body">
				<!-- <label class="form_check">
				  <input class="form-check-input" type="checkbox" value="all" name="city">
				  <span class="form-check-label">
				   All
				  </span>
				</label>  -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="gampaha" name="city">
				  <span class="form-check-label">
				   Gampaha
				  </span>
				</label> <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="colombo" name="city">
				  <span class="form-check-label">
				    Colombo
				  </span>
				</label> <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="kaluthara" name="city">
				  <span class="form-check-label">
				    Kaluthara
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="matara" name="city">
				  <span class="form-check-label">
				    Matara
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="hambanthota" name="city">
				  <span class="form-check-label">
				    Hambanthota
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="polonnaruwa" name="city">
				  <span class="form-check-label">
				    Polonnaruwa
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="anuradhapura" name="city">
				  <span class="form-check-label">
				    Anuradhapura
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="rathnapura" name="city">
				  <span class="form-check-label">
				    Rathnapura
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="badulla" name="city">
				  <span class="form-check-label">
				    Badulla
				  </span>
				</label>  <!-- form-check.// --> 
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="nuwaraeliya" name="city">
				  <span class="form-check-label">
				    Nuwara-Eliya
				  </span>
				</label>  <!-- form-check.// --> 
			</div> <!-- card-body.// -->
      <div class="filter_btn_cont">
        <input type="submit" class="btn apply_btn" value="Apply" id="apply_city">
      </div>
    </div>
  </form>

  <form id="priceForm" class="filter_form">
    <div class="filter_title">
     <h5>Price</h5>
     <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </div>
    <button class="filter_btn_expand">
    <h5>Price</h5>
      <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </button>
    <div class="filter_content ">
    <div class="price-input">
        <div class="field">
          <span>Min</span>
          <input type="number" class="input-min" name="minPrice" value="0">
        </div>
        <div class="separator">:</div>
        <div class="field">
          <span>Max</span>
          <input type="number" class="input-max" name="maxPrice" value="10000">
        </div>
      </div>

      <div class="range-input">
      <div class="slider_cont">
        <div class="slider">
          <div class="progress"></div>
        </div>
      </div>
        <input type="range" class="range-min" min="0" max="10000" value="0" step="100">
        <input type="range" class="range-max" min="0" max="10000" value="10000" step="100">
      </div>

      <div class="filter_btn_cont">
        <input type="submit" class="btn apply_btn" value="Apply" id="apply_price">
      </div>
    </div>
  </form>

  <form id="quantityForm" class="filter_form">
    <div class="filter_title">
      <h5>Quantity</h5>
    </div>
    <button class="filter_btn_expand">
    <h5>Quantity</h5>
      <i class="fas fa-angle-right fa-rotate-90 img_filters"></i>
    </button>
<div class="filter_content">
  <div class="quantity-input">
    <div class="field">
      <span>Min</span>
      <input type="number" class="input-min-quantity" name="minQty" value="0">
    </div>
    <div class="separator">:</div>
    <div class="field">
      <span>Max</span>
      <input type="number" class="input-max-quantity" name="maxQty" value="1000">
    </div>
  </div>

  <div class="range-input-quantity">
    <div class="slider_cont">
      <div class="slider">
        <div class="progress-quantity"></div>
      </div>
    </div>
    <input type="range" class="range-min-quantity" min="0" max="1000" value="0" step="1">
    <input type="range" class="range-max-quantity" min="0" max="1000" value="1000" step="1">
  </div>
  
  <div class="filter_btn_cont">
    <input type="submit" class="btn apply_btn" value="Apply" id="apply_quantity">
  </div>
</div>
  </form>



	</article>
    <!-- ======================== -->
   </div>
 </section>



   
   <!-- sidebar section end===================== -->

  </div>

  <div class="marketplace_container_content">


     <!-- item container======================== -->
 
 <section class="items_section">
   <div class="items_cont">

   
   <?php 

   if($data['items']){

            foreach ($data['items'] as $item) {
            ?>
            


    <!-- item -->
    <a href="<?php echo URLROOT ?>/marketplace/itemInfo/<?php echo $item->item_id; ?>" class="item_btn">

     <div class="item">
      <div class="item_img_cont">
       <img class="item_img" src="<?php echo URLROOT.'/store/items/'.$item->item_img ;?>">
       </div>
       <div class="item_desc">
         <p class="item_title"><?php echo $item->name; ?></p>
         <!-- <div class="item_rating">
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         <i class="fas fa-star star_img"></i>
         </div> -->
         <p class="item_price"><?php echo $item->price; ?> / <span><?php echo $item->unit; ?><span></span></p>
       </div>
       
      </div>
      
</a>
    <!-- item end -->

    <?php
            }
          }else{
            echo "<p class='items_text'>No items to show</p> ";
          }
            ?>
  

   </div>
   <div class="pg_cont">
  <?php 
  // $min =$data['page']-5;
  $min =(($data['page']-5)>($data['totPages']-9))&&($data['totPages']>10)? ($data['totPages']-9):($data['page']-5);
  $max =(($data['page']+4)<10)&&($data['totPages']>10)?10:($data['page']+4);
  $prev=($data['page']-1)>0?($data['page']-1):1;
  $next=($data['page']+1)<$data['totPages']?($data['page']+1):$data['totPages'];
  echo "<a href='?page=$prev'><i class='fas fa-arrow-left pg_prev'></i></a>";
  for($j = $min>0 ?$min:1 ; $j<=($max<$data['totPages']? $max:$data['totPages']);$j++ ){
    if($j==$data['page']){
      echo "<a href='?page=$j' class='current_pg pg_no'>$j</a> ";
    }else{
      echo "<a href='?page=$j' class='pg_no'>$j</a> ";
      
    }
  }
  echo "<a href='?page=$next'><i class='fas fa-arrow-right pg_next'></i></a>";
?>     
    </div>
   
  </section>
  
  <!-- item container end======================== -->

  </div>
 </div>



  </div>

</div>


<!-- js === -->
<script type="text/javascript" src="<?php echo URLROOT ?>/assets/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/sellerSidebar.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/marketplace.js"></script>

</body>
</html>