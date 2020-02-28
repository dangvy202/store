<?php
    require '../model/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require '../model/connect.php';
       
        //UPLOAD
        if(isset($_POST['upload'])){
            require '../model/connect.php';
            $ma_sp = $_POST['ma_sp'];
            $ten_sp = $_POST['ten_sp'];
            $don_gia = $_POST['don_gia'];
            $hinh = $_POST['hinh'];
            $loai_sp = $_POST['loai_sp'];
            $mo_ta = $_POST['mo_ta'];
            $query="UPDATE sanpham "
                    ."set loai_sp='".$loai_sp."', "
                    ."ten_sp='".$ten_sp."', "
                    ."don_gia='".$don_gia."', "
                    ."hinh='".$hinh."', "
                    ."mo_ta='".$mo_ta."' "
                    ."where ma_sp=".$ma_sp;
            $uploadsp=$conn->query($query);
        }
         //Lấy thông tin PRODUCTS
         if(isset($_GET['uploadsp']) && ($_GET['ma_sp']>0)){
            $query = "select * from sanpham where ma_sp =".$_GET['ma_sp'];
            $dssp=$conn->query($query);
            $dssp=$dssp->fetch();
        }
        //DELETE PRODUCT
        if(isset($_GET['deletesp']) && ($_GET['ma_sp']>0)){
            $query = "delete from sanpham where ma_sp =".$_GET['ma_sp'];
            $del=$conn->exec($query);
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <?php
        if(isset($_GET['uploadsp']) && ($_GET['ma_sp']>0)){
    ?>
        <h4>TÊN SẢN PHẨM</h4>
            <input type="text" name="ten_sp" value="<?php echo $dssp['ten_sp'];?>"><br>
        <h4>ĐƠN GIÁ</h4>
            <input type="text" name="don_gia" value="<?php echo $dssp['don_gia'];?>"><br>
        <h4>HÌNH</h4>
            <input type="text" name="hinh" value="<?php echo $dssp['hinh'];?>"><br>
        <h4>LOẠI SẢN PHẨM</h4>
            <input type="text" name="loai_sp" value="<?php echo $dssp['loai_sp'];?>">
            <br>
        <h4>MÔ TẢ</h4>
            <input type="text" name="mo_ta" value="<?php echo $dssp['mo_ta'];?>"><br><br>
            <input type="hidden" name="ma_sp" value="<?php echo $_GET['ma_sp'];?>"> 
            <input type="submit" value="Cập nhật" name="upload"><br><br>
      

            <?php }else{?>
            
        <h4>TÊN SẢN PHẨM</h4>
            <input type="text" name="ten_sp"><br>
        <h4>ĐƠN GIÁ</h4>
            <input type="text" name="don_gia"><br>
        <h4>HÌNH</h4>
            <input type="text" name="hinh"><br>
        <h4>LOẠI SẢN PHẨM</h4>
            <input type="text" name="loai_sp">
            <br>
        <h4>MÔ TẢ</h4>
            <input type="text" name="mo_ta"><br><br>
            <input type="hidden" name="ma_sp">
            <input type="submit" value="Thêm mới" name="them"><br><br>
    <?php }?>
    </form>
    <?php
    //Kết nối database
        //ADD PRODUCTS
            if(!empty($_POST['them'])){
                $ten_sp = $_POST['ten_sp'];
                $don_gia = $_POST['don_gia'];
                $hinh = $_POST['hinh'];
                $mo_ta = $_POST['mo_ta'];
                $ma_sp = $_POST['loai_sp'];
                $query = "insert into sanpham(loai_sp,ten_sp,don_gia,hinh,mo_ta)"
                            ."values('1','$ten_sp','$don_gia','$hinh','$mo_ta')";
                $result = $conn->exec($query);
            }
        //DELETE PRODUCTS
            if(isset($_POST['delsp'])){
                $query = "delete from sanpham where ma_sp = '.$ma_sp' ";
                $result = $conn->execute($query);
            }
       $query = "select * from sanpham order by ma_sp DESC";
       $result = $conn->query($query);

       //show database product 
       echo "<table cellspacing='0' cellpadding='10' border='1'style='border-collapse:collapse' width='100%'>";
       echo"<tr><td>Số Thứ Tự</td>"
            ."<td>Tên Sản Phẩm</td>"
            ."<td>Đơn Gía</td>"
            ."<td>Hình</td>"
            ."<td>Mô Tả</td>"
            ."<td>Loại sản phẩm</td>"
            ."<td>Sửa</td>"
            ."<td>Xóa</td>"
            ."</tr>";
       $stt =0;
       foreach($result as $result){
        $stt += 1;
            $ma_sp = $result['ma_sp'];
            $ten_sp = $result['ten_sp'];
            $don_gia = $result['don_gia'];
            $hinh = $result['hinh'];
            $mo_ta = $result['mo_ta'];
            $loai_sp = $result['loai_sp'];
       if(is_file($hinh)){
            $hinh = "<img src ='".$hinh."' width='290px';height='420px' >";
        }
            else
                $hinh = "Không có hình";
                $sua = "<a href ='editproduct.php?uploadsp=1&ma_sp=$ma_sp'>Sửa</a>";
                $xoa ="<a href ='editproduct.php?deletesp=1&ma_sp=$ma_sp'>Xóa</a>";
            
                echo "<tr><td>$stt</td>"
                    ."<td>$ten_sp</td>"
                    ."<td>$don_gia</td>"
                    ."<td>$hinh</td>"
                    ."<td>$mo_ta</td>"
                    ."<td>$loai_sp</td>"
                    ."<td>$sua</a></td>"
                    ."<td>$xoa</a></td>"
                    ."</tr>";
            
        }
        echo "</table>";
    ?>
</body>
</html>