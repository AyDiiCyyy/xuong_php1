<div class="container d-flex align-items-center ">
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Giá sách</th>
                <th scope="col">Ảnh sách</th>
                <th scope="col">Loại sách</th>
                <th><a class="btn btn-success text-light" href="?act=addsp">Thêm</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sp as $key=>$value): ?>
            <tr>
                <th scope="row"><?=$key+1?></th>
                <td><?=$value['tensach']?></td>
                <td><?=$value['gia']?>VND</td>
                <td><img src="uploads/<?=$value['anh']?>" alt="" width="100px"></td>
                <td><?=$value['tenloai']?></td>
                <td>
                    <a class="btn btn-warning text-light" href="?act=editsp&id=<?=$value['id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa k')" class="btn btn-danger text-light" href="?act=sanpham&delete=<?=$value['id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>