<?php
$servername="localhost";
$username="root";
$password="";
$database_name="mental_health_support";

$con=mysqli_connect($servername,$username,$password,$database_name);
if(!$con){
    die("Connection Failed:".mysqli_connect_error());
}
if(isset($_POST['save'])){
    $T_name = $_POST['T_name'];
    $Qualifications = $_POST['Qualifications'];
    $Specialities = $_POST['Specialities'];

    $sql_query = "INSERT INTO therapists (T_name,Qualifications,Specialities)
    VALUES ('$T_name','$Qualifications','$Specialities')";
    if (mysqli_query($con, $sql_query)){
        echo "<script>alert('New Details Entry inserted successfully !')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/DBMS_Project/insert.html" >
        <?php
    }else{
        echo "Error: " .$sql . "" .mysqli_error($con) ;
    }
    mysqli_close($con);

}
?>