<?php
session_start();

require_once "./model/sanpham.php";
require_once "./model/danhmuc.php";
$er = [];
$sp = loadsp();

$act = $_GET["act"] ?? "";
switch ($act) {
    case "":
        if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }
        $view = "view/main.php";
        break;
    case "sanpham":
        if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }

        if(isset($_GET['delete'])){
            $id= $_GET['delete'];
            delete_sp($id);
            echo '<script>alert("Xóa sản phẩm thành công");
            window.location.href = "?act=sanpham";
                     </script>';
        }
        $view = "view/main.php";
        break;
    case "addsp":
        if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }
        $dm = loaddm();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['tensach'] == "") {
                $er['name'] = "Bạn phải nhập tên";
            }
            if ($_POST['gia'] == "") {
                $er['gia'] = "Bạn phải nhập giá";
            }
            if ($_FILES['anh']['size'] == 0) {
                $er['anh'] = "Bạn phải chọn ảnh";
            }
            if ($_POST['maloai'] == "") {
                $er['maloai'] = "Bạn phải chọn loại sách";
            }



            if (!$er) {
                $file_name = $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], "uploads/$file_name");
                insert_sanpham($_POST['tensach'], $_POST['gia'], $file_name, $_POST['maloai']);
                echo '<script>alert("Thêm sản phẩm thành công");
                window.location.href = "?act=sanpham";
                     </script>';
            }
        }
        $view = "view/sp/add.php";
        break;
    case "editsp":
        if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }
        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $file_name=$_POST['anhcu'];
            if ($_FILES['anh']['size'] > 0) {
                $file_name= $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], "uploads/$file_name");
            }
            update_sp($_POST['maloai'],$_POST['name'],$_POST['gia'],$file_name,$id);
            echo '<script>alert("Sửa sản phẩm thành công");
                     </script>';

        }
        $sp = load_one_sp($id);
        $dm = loaddm();
        $view = "view/sp/edit.php";
        break;
    case "danhmuc":
        if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }
        if(isset($_GET['delete'])){
            $id= $_GET['delete'];
            delete_dm($id);
            echo '<script>alert("Xóa danh mục thành công");
            window.location.href = "?act=danhmuc";
                     </script>';
        }
        $dm = loaddm();
        $view = "view/dm/list.php";
        break;
    case "adddm":
        if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['tenloai'] == "") {
                $er['name'] = "Bạn phải nhập tên loại sách";
            }
        if(!$er){
            insert_danhmuc($_POST['tenloai']);
            echo '<script>alert("Thêm danh mục thành công");
                window.location.href = "?act=danhmuc";
                     </script>';
        }
        }
        $view = "view/dm/add.php";
        break;
    case "editdm":
if(!isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }

        if(isset($_GET['id'])){
            $id= $_GET['id'];

            if($_SERVER['REQUEST_METHOD']=="POST"){
                update_dm($_POST['tenloai'],$id);
                echo '<script>alert("Sửa danh mục thành công");
                     </script>';
            }
            $dm=load_one_dm($id);
        }
        $view ="view/dm/edit.php";
        break;
    case "login":
        if(isset($_SESSION['login'])){
            echo '<script>
            window.location.href = "?act=sanpham";
                     </script>';
                     die;
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $fl = 0;
            if ($_POST['name'] == "") {
                $er['name'] = "Bạn phải nhập username";
            }
            if ($_POST['pass'] == "") {
                $er['pass'] = "Bạn phải nhập mật khẩu";
            }
            if(!$er){
                if($_POST['name']=="admin"&&$_POST['pass']==123456){
                    $_SESSION['login'] = "Đăng nhập thành công";
                    echo '<script>alert("Đăng nhập thành công");
                          window.location.href = "?act=sanpham";
                     </script>';
                }else{
                    echo '<script>alert("Sai tài khoản hoặc mật khẩu");
                     </script>';
                }
            }
        }
        $view = "view/login.php";
        break;
    case "logout": 
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }else{
            echo '<script>
            window.location.href = "?act=login";
                     </script>';
                     die;
        }
    default:
        $view = "view/404.php";
}



include_once "./view/header.php";
include $view;
include_once "./view/footer.php";
