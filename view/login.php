<div class="container">
    <h1>Đăng nhập </h1>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">User name:</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên sách" name="name" value="<?=$_POST['name']??''?>"> 
            <span class="text-danger"><?=$er['name']??''?></span>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Pass:</label>
            <input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="pass" value="<?=$_POST['pass']??''?>">
            <span class="text-danger"><?=$er['pass']??''?></span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
