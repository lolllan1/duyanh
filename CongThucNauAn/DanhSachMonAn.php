<?php 
    include 'connectDB.php';
    
    if(isset($_POST["idDanhMuc"]) || isset($_GET["idDanhMuc"])){
        $idDanhMuc = -1;

        if(isset($_GET["idDanhMuc"])){
            $idDanhMuc = $_GET["idDanhMuc"];
        }else{
            $idDanhMuc = $_POST["idDanhMuc"];
        }
        
        $sql = "SELECT monan.* FROM monan INNER JOIN monanthuocdanhmuc ON monan.IdMonAn  = monanthuocdanhmuc.IdMonAn WHERE monanthuocdanhmuc.idDanhMuc = '$idDanhMuc'";
 
        // Thực hiện thêm record
        if ($result =mysqli_query($conn, $sql)) {
    
            $response = array();
            $response["DanhSachMonAn"] = array();
    
            while ($row = $result->fetch_assoc()) {
                // Mảng JSON
                // $img = file_get_contents($row["HinhAnh"]) ;
                // $data = base64_encode($img); 
                // $row["HinhAnh"] = $data;
                array_push($response["DanhSachMonAn"], $row);
                
            }
    
            // Thiết lập header là JSON
            header('Content-Type: application/json;charset=utf8');
            // Hiển thị kết quả
            echo json_encode($response);
    
        } else {
            $array = array('status'=>"errors" , 'message'=>mysqli_error($conn));
            echo "errors";
        }
    }else {
        $array = array('status'=>"errors" , 'message'=>mysqli_error($conn));
        echo "errors";
    }
    
 ?>