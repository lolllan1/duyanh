<?php
function IsNullOrEmptyString($str)
{
    return (!isset($str) || trim($str) === '');
}

function Run()
{
    include 'connectDB.php';

    $target_dir = "uploads/";
    $date = new DateTime("now", new DateTimeZone('Etc/GMT-7'));
    $ngayLuu = $date->format('Y-m-d--H-i-s-u');
    $fileName = $ngayLuu . "." . pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Tệp không phải là hình ảnh.";
            $uploadOk = 0;
            return;
        }
    }
    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Tệp hình ảnh quá lớn";
        $uploadOk = 0;
        return;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Hình ảnh chỉ nhận các định JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
        return;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Không thể tạo mới. Do không lưu được tệp ảnh.";
        // if everything is ok, try to upload file
    } else {
        $tenMonAn = $_POST["tenMonAn"];
        $congThuc = $_POST["congThuc"];
        $pathFile = basename($_FILES["fileToUpload"]["name"]);
        if (IsNullOrEmptyString($tenMonAn)) {
            echo "Không được để trống tên món ăn";
        } else {
            $sql = "INSERT INTO monan(TenMonAn, HinhAnh, CongThuc) VALUES ('$tenMonAn', '$target_file', '$congThuc')";
            $result = $conn->query($sql);

            if ($result) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "Tạo mới món ăn thành công";
                } else {
                    echo "Tạo món ăn gặp lỗi.";
                }
            } else {
                echo "Tạo mới món ăn thất bại";
            }
        }
    }
}
Run();
