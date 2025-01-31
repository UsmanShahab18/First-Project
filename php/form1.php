<?php
// $servername , $username , $password and $database_name these are variable just like we make in C++ and we assing the real 
// value localhost is server name where i will create database name 'mental_health_support'  
// In PHP we create variable with '$' this sing
$servername="localhost";
$username="root";
$password="";
$database_name="mental_health_support";

// mysqli_connect() is built in function where i pass these variable. this function is used to connect the database with HTML form.
$conn=mysqli_connect($servername,$username,$password,$database_name);

// here we check connection 
if(!$conn){
    die("Connection Failed:".mysqli_connect_error());
}

// Here we get data from HTML form which User enter recently and insert into Users table 
if(isset($_POST['save'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // here i create insert query variable and store that query which will executed
    $sql_query = "INSERT INTO users (username,password,email)
    VALUES ('$username','$password','$email')";

    // here i used built in fuction in php where i pass connection and query variable.
    if (mysqli_query($conn, $sql_query)){
        
        // echo is similar as cout in C++, which is used to display message and here i will used JavaScrit also but one line which 
        // show pop up message if the if condition is true.
        echo "<script>alert('New Details Entry inserted successfully !')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/DBMS_Project/insert.html" >
        <?php
    }else{
        echo "Error: " .$sql . "" .mysqli_error($conn) ;
    }
    // here i will close the connection between Html form or Database
    mysqli_close($conn);

}
?>