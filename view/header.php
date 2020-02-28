<!DOCTYPE html>
<html>
<head>
<title>Pet Shop</title>
<meta charset="iso-8859-1">
<link href="../public/css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
<style>
  .navigation li{
        position: relative;
  }
.navigation li a{
        display: inline-block;
}
.navigation #menuchild{
        display: none;
        position: absolute;
}
.navigation li:hover>#menuchild{
       
}
.navigation>li>#menuchild{
        top: 40px;
        left: 0;
    } 
  #menuchild li {
    border: 2px solid black;
  }
</style>
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="../public/images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li class="active"><a href="index.php?act=home">Home</a></li>
    <li><a href="index.php?act=product">Product</a></li>
    <li><a href="about.html">About us</a></li>
    <li><a href="blog.html">Blog</a></li>
    <li><a href="index.php?act=login">Login</a></li>
    <li><a href="contact.html">Contact us</a></li>
  </ul>
</div>