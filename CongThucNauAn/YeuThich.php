<?php
function Run()
{
    include 'connectDB.php';

    if (isset($_POST["IdThietBi"])) {
        $IdThietBi = $_POST["IdThietBi"];
        $IdMonAn = $_POST["IdMonAn"];
        $TrangThai = $_POST["TrangThai"];

        $sql = "";

        if($TrangThai == 1){
            $sql = "INSERT INTO yeuthich(IdMonAn, MaDinhDanh) VALUES ('$IdMonAn', '$IdThietBi')";
        }else{
            $sql = "DELETE FROM yeuthich WHERE IdMonAn='$IdMonAn' AND MaDinhDanh ='$IdThietBi'";
        }
        $result = $conn->query($sql);

        header('Content-Type: application/json;charset=utf8');

        if ($result) {
            $array = array('status'=>"success" , 'message'=>mysqli_error($conn));
            echo json_encode($array);
        } else {
            $array = array('status'=>"errors" , 'message'=>mysqli_error($conn));
            echo json_encode($array);
        }
    }
}
Run();

?>