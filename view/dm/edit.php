<div class="container">
    <h1>Sửa danh mục</h1>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Tên loại sách:</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên loại sách" name="tenloai" value="<?=$dm['tenloai']??''?>"> 
            <span class="text-danger"><?=$er['name']??''?></span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
