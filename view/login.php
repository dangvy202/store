<?php
    require 'header.php';
?>
<body>
<div id="body">
  <div id="content">
    <div id="sidebar">
      <div id="section">
      </div>
         <form action="" mothod="POST" class="aa-login-form">
            <label for="">Username or Email address</label>
            <input type="text" name="username" placeholder="Username or email"><br>
            <label for="">Password</label><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="submit">Login</button>
            <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
        </form>
        <?php
          include("../model/connect.php");
          if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $password = md5($password);
            $sql = "SELECT * FROM khach_hang WHERE username = '$username' and password = '$password'";
            $query = mysqli_query($conn,$sql);
            $num_row=mysqli_num_row($query);
            if($num_row!=0){
              header('Location: ./controller/themkh.php');
            }
            else{
              echo "Thất bại";
            }
          }




            /*require '../model/connect.php';
            if(isset($_POST['submit'])){
                if($_POST['submit']){
                $username = $_POST['username'];
                $password = $_POST['password'];
                //check custom login
                $sql = "SELECT * FROM khach_hang WHERE username=? AND password=?";
                $result = $conn->query_one($sql,$username,$password);
                if(is_array($result)){
                    extract($result);
                    $_SESSION['ma_kh']=$ma_kh;
                    $_SESSION['ten_kh']=$ten_kh;
                }else{
                    echo "Nhập lại";
                }
            }
            }*/
                
        ?>
    </div>
  </div>
  <div class="featured">
    <ul>
      <li><a href="#"><img src="../public/images/organic-and-chemical-free.jpg" width="300" height="90" alt=""></a></li>
      <li><a href="#"><img src="../public/images/good-food.jpg" width="300" height="90" alt=""></a></li>
      <li class="last"><a href="#"><img src="../public/images/pet-grooming.jpg" width="300" height="90" alt=""></a></li>
    </ul>
  </div>
</div>
<?php
    require 'footer.php';
?>
