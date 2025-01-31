<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "mental_health_support";

$con = mysqli_connect($servername, $username, $password, $database_name);
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $T_id = $_POST['T_id'];
    $U_id = $_POST['U_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];

    // Check if U_id exists in users table
    $user_check_query = "SELECT * FROM users WHERE U_id = '$U_id'";
    $result = mysqli_query($con, $user_check_query);

    if (mysqli_num_rows($result) > 0) {
        $sql_query = "INSERT INTO appointments (T_id, U_id, date, time, duration)
        VALUES ('$T_id', '$U_id', '$date', '$time', '$duration')";
        
        if (mysqli_query($con, $sql_query)) {
            echo "<script>alert('New Details Entry inserted successfully !')</script>";
            ?>
                <meta http-equiv="refresh" content="0; url = http://localhost/DBMS_Project/insert.html" >
            <?php
        } else {
            echo "Error: " . $sql_query . " " . mysqli_error($con);
        }
    } else {
        echo "Error: The U_id provided does not exist in the users table.";
    }

    mysqli_close($con);
}
?>