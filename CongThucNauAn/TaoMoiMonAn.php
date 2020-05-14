<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="summernote/summernote-bs4.min.css">

<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="summernote/summernote-bs4.min.js"></script>

<body class="container">
    <form class="form" action="MonAn.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên món ăn</label>
            <input type="text" class="form-control" name="tenMonAn" id="tenMonAn">
        </div>

        <div class="form-group">
            <label>Ảnh món ăn</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="fileToUpload"  id="fileToUpload">
                <label class="custom-file-label" for="inputGroupFile01">Chọn ảnh</label>
            </div>
        </div>

        <div class="form-group">
                <label>Công thức chế biến</label>
                <textarea class="form-control" id="comgThuc" name="congThuc"></textarea>
            </div>


        <input type="submit" class="btn btn-primary" value="Tạo mới" name="submit">
    </form>

    <script>
        $(document).ready(function() {
            $('#comgThuc').summernote({
                placeholder: 'Công thức chế biến',
                tabsize: 2,
                height: 300
            });
        });
    </script>
</body>
</html>