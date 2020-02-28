<?php
    require '../model/connect.php';
?>
<?php
    function khach_hang_insert($ma_kh, $ten_kh, $dia_chi, $dien_thoai, $email, $loai, $username, $password){
        $sql = "INSERT INTO khach_hang(ma_kh, ten_kh, dia_chi, dien_thoai, email, loai, username, password) VALUES (?,?,?,?,?,?,?)";
        $result = $conn->execute($sql);
    }

    function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
        $sql = "UPDATE khach_hang SET ma_kh=?, ten_kh=?, dia_chi=?, dien_thoai=?, email=?, loai=?, username=?, password=? WHERE ma_kh=?";
        $result = $conn->execute($sql);
    }

    function khach_hang_delete($ma_kh){
        $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
        if(is_array($ma_kh)){
            foreach ($ma_kh as $ma) {
                pdo_execute($sql, $ma);
            }
        }
        else{
            pdo_execute($sql, $ma_kh);
        }
    }

    function khach_hang_select_all(){
        $sql = "SELECT * FROM khach_hang";
        return pdo_query($sql);
    }

    function khach_hang_select_by_id($ma_kh){
        $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
        return pdo_query_one($sql, $ma_kh);
    }

    function khach_hang_exist($ma_kh){
        $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
        return pdo_query_value($sql, $ma_kh) > 0;
    }

    function khach_hang_select_by_role($vai_tro){
        $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
        return pdo_query($sql, $vai_tro);
    }

    function khach_hang_change_password($ma_kh, $mat_khau_moi){
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        pdo_execute($sql, $mat_khau_moi, $ma_kh);
    }