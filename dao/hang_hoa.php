<?php
    require_once 'pdo.php';
    function hh_insert($ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai){
        $sql = "INSERT INTO hang_hoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,so_luot_xem,ma_loai) VALUES(?)";
        pdo_execute($sql, $ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai);
       }
       function hh_update($ma_hh, $ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai){
        $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ngay_nhap=?,mo_ta=?,dac_biet=?,so_luot_xem=?,ma_loai=? WHERE ma_hh=?";
        pdo_execute($sql,$ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai, $ma_loai, $ma_hh);
       }
       function hh_delete($ma_hh){
        $sql = "DELETE FROM hang_hoa WHERE ma_hh=?";
        if(is_array($ma_hh)){
        foreach ($ma_hh as $ma) {
        pdo_execute($sql, $ma);
        }
        }
        else{
        pdo_execute($sql, $ma_hh);
        }
       }
       function hang_hoa_select_all(){
        $sql = "SELECT * FROM hang_hoa order by ma_hh desc";
        return pdo_query($sql);
       }

       function hh_select_by_id($ma_hh){
        $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
        return pdo_query_one($sql, $ma_hh);
       }
       function hang_hoa_select_all_view(){
        $sql = "SELECT * FROM hang_hoa order by so_luot_xem desc";
        return pdo_query($sql);
       }
       function hh_exist($ma_loai){ 
        $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
        return pdo_query_value($sql, $ma_hh) > 0;
       }
                            
?>