<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="summernote/summernote-bs4.min.css">

<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="summernote/summernote-bs4.min.js"></script>
<? 
    include 'connectDB.php';
    $maMonAn = $_GET["idMonAn"];
    $sql = "SELECT * FROM monan where idMonAn = '$maMonAn'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
?>

<body class="container">
    <form class="form" action="MonAn_Sua.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idMonAn" value="<?echo $data["IdMonAn"]?>" />
        <div class="form-group">
            <label>Tên món ăn</label>
            <input type="text" class="form-control" name="tenMonAn" id="tenMonAn" value="<?echo $data["TenMonAn"]?>">
        </div>

        <div class="form-group">
                <label>Công thức chế biến</label>
                <textarea class="form-control" id="comgThuc" name="congThuc" value="<?echo $data["CongThuc"]?>"></textarea>
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