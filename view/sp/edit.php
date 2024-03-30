<div class="container">
    <h1>Sửa sản phẩm</h1>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Tên sách:</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập tên sách" name="name" value="<?=$sp['tensach']??''?>"> 
            <span class="text-danger"><?=$er['name']??''?></span>
        </div>
        <div class="mb-3">
            <label for="gia" class="form-label">Giá:</label>
            <input type="text" class="form-control" id="gia" placeholder="Nhập giá" name="gia" value="<?=$sp['gia']??''?>">
            <span class="text-danger"><?=$er['gia']??''?></span>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Chọn ảnh:</label>
            <input type="file" class="form-control" id="img" name="anh">
            <img src="uploads/<?=$sp['anh']?>" alt="" width="100px">
            <input type="hidden" name="anhcu" value="<?=$sp['anh']?>">
            <span class="text-danger"><?=$er['anh']??''?></span>
        </div>
        <div class="mb-3">
            <label for="maloai" class="form-label">Loại sách:</label>
            <select class="form-select" aria-label="Default select example" name="maloai" id="maloai">
                <option value="" selected>Chọn loại sách</option>
                <?php foreach($dm as $value) : ?>
                <option value="<?=$value['id']?>" <?=($sp['maloai']==$value['id'])?"selected":""?>><?=$value['tenloai']?></option>
                <?php endforeach ?>
            </select>
            <span class="text-danger"><?=$er['maloai']??''?></span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
