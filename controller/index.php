<?php
    session_start();
    require '../model/connect.php';


    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'home':
                require '../view/home.php';
            break;
            case 'product':
                require '../view/product.php';
            break;  
            case 'login':
                require '../view/login.php';
            break;
            case 'productdetails':

                require '../view/productdetail.php';
            break;
            case 'ssp': 
            if(isset($_GET['CTSP'])){
                include '../view/productdetails.php';
            }
            default:
                require '../view/home.php';
            break;
        }
    }
    else{
        require '../view/home.php';
    }
?>