<?php
function IsNullOrEmptyString($str)
{
    return (!isset($str) || trim($str) === '');
}

function Run()
{
    include 'connectDB.php';
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {

    // Allow certain file formats
    $idMonAn = $_POST["idMonAn"];
    $tenMonAn = $_POST["tenMonAn"];
    $congThuc = $_POST["congThuc"];
    if (IsNullOrEmptyString($tenMonAn)) {
        echo "Không được để trống tên món ăn";
    } else {
        $sql = "UPDATE monan SET TenMonAn = '$tenMonAn', CongThuc = '$congThuc' WHERE idMonAn = '$idMonAn'";
        $result = $conn->query($sql);

        if ($result) {
            echo "Cập nhật món ăn thành công.";
        } else {
            echo "Cập nhật món ăn thất bại";
        }
    }}
}
Run();