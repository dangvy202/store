<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Quản lí khách hàng</title>
</head>
<body>
    <?php
       
        $conn=mysqli_connect("localhost","root","") or die("CANNOT CONNECT");
        $db = mysqli_select_db($conn, "php1") or die ("CANNOT CONNECT");
        mysqli_query($conn,"sets name UTF-8");
        //
        if(isset($_POST["Them"]))
        {
            $ma = $_POST["Ma"];
            $ten = $_POST["Ten"];
            $diachi = $_POST["DChi"];
            $dt = $_POST["DT"];
            $email = $_POST["Email"];
            $result = mysqli_query($conn,
                        "INSERT INTO khach_hang (ma_kh, ten_kh, dia_chi, dien_thoai, email ) VALUES ( null, '".$ten."', '".$diachi."', '".$dt."', '".$email."');");
                    }
        else if(isset($_POST["Sua"]) && $_POST["Ma"] != "")
        {
            $ma = $_POST["Ma"];
            $ten = $_POST["Ten"];
            $diachi = $_POST["DChi"];
            $dt = $_POST["DT"];
            $email = $_POST["Email"];
            $result = mysqli_query($conn,
                        "UPDATE khach_hang SET ten_kh = '".$ten."' WHERE khach_hang.`ma_kh` = $ma;");
        }
        else if(isset($_POST["Xoa"]) && $_POST["Ma"] != "")
        {
            $ma = $_POST["Ma"];
            $ten = $_POST["Ten"];
            $diachi = $_POST["DChi"];
            $dt = $_POST["DT"];
            $email = $_POST["Email"];
            $result = mysqli_query($conn,
                        "DELETE FROM khach_hang WHERE khach_hang.`ma_kh` = $ma");
        }
        else
        {
            $ma = "";
            $ten = "";
            $diachi = "";
            $dt = "";
            $email ="";
            
        }

    ?>
    <form action = "" method = "post">
        <div class="tieude">Thêm-xóa-sửa Khách Hàng</div>
        <div class="ml">
            <table width = 100%;>
                <tr>
                    <td>Mã KHàng: </td>
                    <td><input type="text" name = "Ma" id="Ma" value="<?php echo $ma;?>"></td>
                </tr>
                <tr>
                    <td>Tên KHàng: </td>
                    <td><input type="text" name="Ten" id="Ten" value="<?php echo $ten;?>"></td>
                </tr>
                <tr>
                    <td>Địa Chỉ: </td>
                    <td><input type="text" name="DChi" id="DChi" value="<?php echo $diachi;?>"></td>
                </tr>
                <tr>
                    <td>SĐT: </td>
                    <td><input type="text" name="DT" id="DT" value="<?php echo $dt;?>"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="Email" id="Email" value="<?php echo $email;?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="chumau1" type="submit" name="Them" value="Thêm KHàng">
                        <input class="chumau2" type="submit" name="Sua" value="Sửa">
                        <input class="chumau3" type="submit" name="Xoa" value="Xóa">
                    </td>
                </tr>
            </table>
        </div>

<!-- ------------------------------------------------------------------------------------------- -->
   
    </form>
</body>
</html>