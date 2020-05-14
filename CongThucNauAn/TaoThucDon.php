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
    $sql = "SELECT * FROM monan";
    $result = $conn->query($sql);
?>
<body class="container">
    <form class="form" action="ThucDon.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Món ăn</label>
            <? 
                $sqlDanhMuc = "SELECT * FROM monan";
                $result = $conn->query($sqlDanhMuc);
            ?>

            <select class="form-control" name='monAn'>  
            <?  
            while($row = $result->fetch_assoc()){  
            ?>  
                <option value="<? echo $row['IdMonAn']; ?>"> <?echo $row['TenMonAn'];?></option> 
            <?  
                }  
            ?> 
            </select>
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <? 
                $sql = "SELECT * FROM danhmuc";
                $resultThucDon = $conn->query($sql);

            ?>

            <select class="form-control" name='danhMuc'>  
            <?  
            while($row = $resultThucDon->fetch_assoc()){  
                ?>  
                    <option value="<? echo $row['IdDanhMuc']; ?>"><?echo $row['TenDanhMuc'];?></option> 
                <?  
                    }  
                ?> 
            </select>
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