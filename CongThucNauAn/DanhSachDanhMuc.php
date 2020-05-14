<?php 
    include 'connectDB.php';
    
	$sql = "SELECT * FROM danhmuc";
 
    // Thực hiện thêm record
	if ($result =mysqli_query($conn, $sql)) {

        $response = array();
        $response["DanhSachDanhMuc"] = array();

        while ($row = $result->fetch_assoc()) {
           try {
               
            $temp = $row["IdDanhMuc"];
                $sqlCount = "SELECT COUNT(IdMonAn) as SoThucDon FROM monanthuocdanhmuc WHERE '$temp' = IdDanhMuc";
                $rlCount = mysqli_query($conn,$sqlCount);

                $count = $rlCount->fetch_assoc();
                $row["SoThucDon"] = $count["SoThucDon"];
                array_push($response["DanhSachDanhMuc"], $row);
           } catch (\Throwable $th) {
               echo $th;
           }
        }

        // Thiết lập header là JSON
        header('Content-Type: application/json;charset=utf8');
        // Hiển thị kết quả
        echo json_encode($response);

	} else {
	    $array = array('status'=>"errors" , 'message'=>mysqli_error($conn));
	    echo "errors";
    }
    
 ?>