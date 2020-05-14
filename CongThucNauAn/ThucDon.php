<?php
function Run()
{
    include 'connectDB.php';

    if (isset($_POST["submit"])) {
        $monAn = $_POST["monAn"];
        $danhMuc = $_POST["danhMuc"];

        $sql = "INSERT INTO monanthuocdanhmuc(IdMonAn, IdDanhMuc) VALUES ('$monAn', '$danhMuc')";
        $result = $conn->query($sql);

        if ($result) {
            echo "Thêm món ăn vào danh mục thành công";
        } else {
            echo "Thêm món ăn vào danh mục thất bại";
        }
    }
}
Run();

?>