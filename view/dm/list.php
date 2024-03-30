<div class="container d-flex align-items-center ">
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Loại sách</th>
                <th><a class="btn btn-success text-light" href="?act=adddm">Thêm</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dm as $key=>$value): ?>
            <tr>
                <th scope="row"><?=$key+1?></th>
                <td><?=$value['tenloai']?></td>
                <td>
                    <a class="btn btn-warning text-light" href="?act=editdm&id=<?=$value['id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger text-light" href="?act=danhmuc&delete=<?=$value['id']?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>