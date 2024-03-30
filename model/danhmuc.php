<?php

require_once "pdo.php";



function loaddm (){
    $sql= "SELECT * FROM loaisach";
    return pdo_query($sql);
}


function delete_dm($id){
    $sql = "DELETE FROM loaisach WHERE id =?";
    pdo_execute($sql, $id);
}

function insert_danhmuc($name){
    $sql = "INSERT INTO loaisach (tenloai) VALUES (?)";
    pdo_execute($sql, $name);
}
function load_one_dm($id){
    $sql = "SELECT * FROM loaisach WHERE id = ?";
    return pdo_query_one($sql,$id);
}

function update_dm($tenloai,$id){
    $sql = "UPDATE loaisach SET tenloai = ? WHERE id=?";
    pdo_execute($sql,$tenloai,$id);
}

?>