<?php 
    include 'connectDB.php';
    
    if(isset($_POST["IdThietBi"])){

        $idThietBi = $_POST["IdThietBi"];
        $IdMonAn = $_POST["IdMonAn"];
        $sql = "SELECT * FROM yeuthich WHERE yeuthich.MaDinhDanh = '$idThietBi' AND yeuthich.IdMonAn = '$IdMonAn'";
 
        // Thực hiện thêm record
        if ($result =mysqli_query($conn, $sql)) {
    
            $response = array();
            
            if ($row = $result->fetch_assoc()) {
                $array = array('status'=>"success" , 'message'=>mysqli_error($conn));
                echo json_encode($array);
            } else {
                $array = array('status'=>"errors" , 'message'=>mysqli_error($conn));
                echo json_encode($array);
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