<?php
    require 'header.php';
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Product</title>
    <!-- Font awesome -->
    <link href="../public/style2/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../public/style2/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="../public/style2/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="../public/style2/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="../public/style2/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="../public/style2/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="../public/style2/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="../public/style2/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="../public/style2/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
    <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg" >
                <!-- start single product item -->
                <div class="aa-product-catg-head-right">
                  <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                  <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                </div>
                <?php
                  require '../model/connect.php';
                  $query =  "select * from sanpham order by ma_sp DESC";
                  $result = $conn->query($query);
                  foreach ($result as $result){
                    $masp = $result['ma_sp'];
                    $ten_sp = $result['ten_sp'];
                    $don_gia = $result['don_gia'];
                    $hinh = $result['hinh'];
                    $mo_ta = $result['mo_ta'];
                    if(is_file($hinh)){
                      $hinh = "<img src ='".$hinh."' width='290px';height='420px' >";
                    }else{
                      $hinh = "Không có hình";
                    }
                  echo '
                  <li>
                  <figure>
                    <a class="aa-product-img" href="">'.$hinh.'</a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="">'.$ten_sp.'</a></h4>
                      <span class="aa-product-price">'.$don_gia.'</span><span class="aa-product-price"><del>$65.50</del></span>
                      <p class="aa-product-descrip">'.$mo_ta.'</p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="index.php?act=ssp=act=CTSP='.$masp.'" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div> 
                </li>';
              }
                ?>
                <!-- start single product item -->
                                                          
              </ul>
              <!-- quick view modal -->                  
              
              <!-- / quick view modal -->   
            </div>
            
          </div>
        </div>
        
       
      </div>
    </div>
        
  </section>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../public/style2/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="../public/style2/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="../public/style2/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="../public/style2/js/sequence.js"></script>
  <script src="../public/style2/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="../public/style2/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="../public/style2/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="../public/style2/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="../public/style2/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="../public/style2/js/custom.js"></script> 
  

  <!-- / product category -->
  </body>
</html>

  
  


