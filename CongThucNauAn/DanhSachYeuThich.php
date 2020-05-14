<?php 
    include 'connectDB.php';
    
    if(isset($_POST["idThietBi"]) || isset($_GET["idThietBi"])){
        $idThietBi = -1;

        if(isset($_GET["idThietBi"])){
            $idThietBi = $_GET["idThietBi"];
        }else{
            $idThietBi = $_POST["idThietBi"];
        }
        
        $sql = "SELECT monan.* FROM yeuthich INNER JOIN monan ON yeuthich.IdMonAn = monan.IdMonAn WHERE yeuthich.MaDinhDanh = '$idThietBi'";
 
        // Thực hiện thêm record
        if ($result =mysqli_query($conn, $sql)) {
    
            $response = array();
            $response["DanhSachYeuThich"] = array();
    
            while ($row = $result->fetch_assoc()) {
                // Mảng JSON
                // $img = file_get_contents($row["HinhAnh"]) ;
                // $data = base64_encode($img); 
                // $row["HinhAnh"] = $data;
                array_push($response["DanhSachYeuThich"], $row);
                
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