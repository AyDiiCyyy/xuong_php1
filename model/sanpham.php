<?php

require_once "pdo.php";



function loadsp (){
    $sql= "SELECT sach.id, tensach, gia, anh, maloai, loaisach.tenloai FROM sach INNER JOIN loaisach ON loaisach.id=sach.maloai";
    return pdo_query($sql);
}

function insert_sanpham($name, $price, $img, $id_danhmuc){
    $sql = "INSERT INTO sach (tensach, gia, anh, maloai) VALUES (?,?,?,?)";
    pdo_execute($sql, $name, $price, $img, $id_danhmuc);
}

function load_one_sp($id){
    $sql = "SELECT * FROM sach WHERE id = ?";
    return pdo_query_one($sql,$id);
}
function update_sp($id_danhmuc,$name,$price,$img,$id){
    $sql = "UPDATE sach SET maloai = ?, tensach = ?, gia = ?, anh=? WHERE id=?";
    pdo_execute($sql,$id_danhmuc,$name,$price,$img,$id);
}
function delete_sp($id_sp){
    $sql = "DELETE FROM sach WHERE id =?";
    pdo_execute($sql, $id_sp);
}

?>