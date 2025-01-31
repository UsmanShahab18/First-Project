<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "mental_health_support";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['save'])) {
    // Get form data
    $U_id = $_POST['U_id'];
    $Prescribed = $_POST['Prescribed'];
    $Dosage = $_POST['Dosage'];
    $Side_Effects = $_POST['Side_Effects'];

    // Print the U_id for debugging
    echo "Provided U_id: " . $U_id . "<br>";

    // Check if U_id exists in users table
    $user_check_query = "SELECT * FROM users WHERE U_id = '$U_id'";
    $result = mysqli_query($conn, $user_check_query);

    if (mysqli_num_rows($result) > 0) {
        // Insert data into medications table
        $sql_query = "INSERT INTO medications (U_id, Prescribed, Dosage, Side_Effects)
                    VALUES ('$U_id', '$Prescribed', '$Dosage', '$Side_Effects')";
        
        if (mysqli_query($conn, $sql_query)) {
            echo "<script>alert('New Details Entry inserted successfully !')</script>";
            ?>
                <meta http-equiv="refresh" content="0; url = http://localhost/DBMS_Project/insert.html" >
            <?php
        } else {
            echo "Error: " . $sql_query . " " . mysqli_error($conn);
        }
    } else {
        echo "Error: The U_id provided does not exist in the users table.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>