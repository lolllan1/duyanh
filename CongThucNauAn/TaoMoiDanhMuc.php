<!DOCTYPE html>
<html>
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/popper.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="summernote/summernote-bs4.min.css">
<script src="summernote/summernote-bs4.min.js"></script>

<body class="container">
    <form class="form" action="DanhMuc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" class="form-control" name="danhMuc" id="danhMuc">
        </div>

        <div class="form-group">
            <label>Ảnh danh mục</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="fileToUpload"  id="fileToUpload">
                <label class="custom-file-label" for="inputGroupFile01">Chọn ảnh</label>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Tạo mới" name="submit">
    </form>
</body>
</html>