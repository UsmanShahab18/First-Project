<?php 
    error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "mental_health_support";

    $conn = mysqli_connect($servername,$username,$password,$database_name);

    if($conn){
        // echo "Connection Ok";
    }
    else{
        echo "Error" .mysqli_connect_error();
    }
    $id = $_GET['T_id'];
    $query ="DELETE From therapists where T_id = '$id'";
    $data = mysqli_query($conn,$query);

    if($data){
        echo "<script>alert('Record Deleted successfully!')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/DBMS_Project/modify.php" >
        <?php 
    }
    else{
        echo "Failed To Delete Record";
    }

?>