<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "mental_health_support";

$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_GET['U_id'])) {
    $id = $_GET['U_id'];
    $query = "SELECT * FROM users WHERE U_id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($conn);
        $row = null; // Handle the case where no data is returned
    }
}

if (isset($_POST['save'])) {
    $U_id = $_POST['U_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql_query = "UPDATE users SET U_id='$U_id', username='$username', password='$password', email='$email' WHERE U_id = $id";
    if (mysqli_query($conn, $sql_query)) {
        echo "<script>alert('Record Updated successfully!')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/DBMS_Project/modify.php" >
        <?php
    } else {
        echo "Error: " . $sql_query . " " . mysqli_error($conn);
    }
}

// Close the connection at the end
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="website icon" type="png" href="pic/1.png">
    <link rel="stylesheet" href="CSS/update.css">
    <link rel="stylesheet" href="CSS/insert.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/DBMS Project/header-footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Black+Ops+One&family=Dancing+Script&family=Manrope&family=Noto+Nastaliq+Urdu&family=Pacifico&family=Roboto&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Manrope&family=Noto+Nastaliq+Urdu&family=Pacifico&family=Roboto&family=Tilt+Prism&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Updation</title>
</head>
<body>
<div class="form" style="width: 30%;">
        <form action="#" method="post" style="width: 100%;">
            <div>
                <h4>Update Patient Data</h4>
            </div>
            <div class="box" style="width: 100%;">
            <i class="fa-solid fa-list-ol icon"></i>
                <input type="number"
                value="<?php echo htmlspecialchars($row['U_id'], ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="Patient ID"
                name="U_id">
            </div>
            <div class="box" style="width: 100%;">
                <i class="fa-solid fa-hospital-user icon"></i>             
                <input 
                    type="text"
                    value="<?php echo htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="Username"
                    name="username"
                    required
                >
            </div>
            <div class="box"style="width: 100%;">
                <i class="fa fa-lock icon" aria-hidden="true"></i>
                <input 
                    type="password"
                    value="<?php echo htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="Password"
                    name="password"
                    required
                >
            </div>
            <div class="box" style="width: 100%;">
                <i class="fa-regular fa-envelope icon"aria-hidden="true"></i>
                <input type="email"
                value="<?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="E-mail"
                name="email"
                >
            </div>
            <div class="button">
                <input type="submit" value="submit" name="save" style="width: 100%;">
            </div>
        </form>
    </div>
</body>
</html>