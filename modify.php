<?php 

$conn=mysqli_connect("localhost","root","","mental_health_support");

if(!$conn){
    die("Connection Failed:".mysqli_connect_error());
}
    
$query = "Select * From users";
$result = mysqli_query($conn,$query);
//for therapists table
$query1 = "Select * From therapists";
$result1 = mysqli_query($conn,$query1);
//For resources table
$query2 = "Select * From resources";
$result2 = mysqli_query($conn,$query2);
//fro progress table
$query3 = "Select * From progress";
$result3 = mysqli_query($conn,$query3);
//for profiles table
$query4 = "Select * From profiles";
$result4 = mysqli_query($conn,$query4);
//for medications table
$query5 = "Select * From medications";
$result5 = mysqli_query($conn,$query5);
//For feedback table
$query6 = "Select * From feedback";
$result6 = mysqli_query($conn,$query6);
//For exercises Table
$query7 = "Select * From exercises";
$result7 = mysqli_query($conn,$query7);
//Fro conditions table 
$query8 = "Select * From conditions";
$result8 = mysqli_query($conn,$query8);
//for appointments table
$query9 = "Select * From appointments";
$result9 = mysqli_query($conn,$query9);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .update, .delete{
            background-color: greenyellow;
            color: black;
            border: 0;
            outline: none;
            border-radius: 10px;
            height: 30px;
            width: 88px;
            font-weight: bold;
            cursor: pointer;
        }
        .update:hover{
            background-color: darkorange;
            color: white;
        }
        .delete{
            background-color: red;
        }
        .delete:hover{
            background-color: darkred;
            color: white;
        }
    </style>
    <link rel="website icon" type="png" href="pic/1.png">
    <link rel="stylesheet" href="CSS/display.css">
    <link rel="stylesheet" href="CSS/header-footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/DBMS Project/header-footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Black+Ops+One&family=Dancing+Script&family=Manrope&family=Noto+Nastaliq+Urdu&family=Pacifico&family=Roboto&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Manrope&family=Noto+Nastaliq+Urdu&family=Pacifico&family=Roboto&family=Tilt+Prism&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Data</title>
    <script>
            function checkdelete(){
                return confirm('Are You sure your want to delete this record ?');
            }
        </script>
</head>
<body>
    <header>

        <a href="#" class="logo"><img src="pic/1.png" class="pic" alt=""></a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="menu">Menu</label>

        <nav class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">More <i class="fas fa-caret-down icon"></i></a>
                    <ul>
                        <li><a href="insert.html">Insert Data</a></li>
                        <li><a href="display.php">Display Data</a></li>
                        <li><a href="modify.php">Modify Data</a></li>
                    </ul>
                </li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </nav>
    </header>

    <section style="padding-top: 10rem;">
        <div class="table" style="filter: drop-shadow(10px 7px 10px rgb(48, 48, 46));">
            <h3 class="first">Patient Table</h3>
                <table class="content-table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>E-mail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td><?php echo $row['U_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><a href='update.php?U_id=<?php echo $row["U_id"]; ?>'><input type="submit" value="Update" class="update"></a></td>
                            <td><a href='delete.php?U_id=<?php echo $row["U_id"]; ?>'><input type="submit" value="Delete" class="delete" onclick='return checkdelete()'></a></td>
                        </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>

                <div class="table" style="filter: drop-shadow(10px 7px 10px rgb(48, 48, 46));">
                    <h3 >Therapists Table</h3>
                    <table class="content-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Therapist ID</th>
                                <th>Name</th>
                                <th>Qualifications</th>
                                <th>Specialities</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($result1)){
                            ?>
                            <td><?php echo $row['T_id']; ?></td>
                            <td><?php echo $row['T_name']; ?></td>
                            <td><?php echo $row['Qualifications']; ?></td>
                            <td><?php echo $row['Specialities']; ?></td>
                            <td><a href='update1.php?T_id=<?php echo $row["T_id"]; ?>' class="e-button"><input type="submit" value="Update" class="update"></a></td>
                            <td><a href="delete1.php?T_id=<?php echo $row["T_id"]; ?>" class="d-button"><input type="submit" value="Delete" class="delete" onclick='return checkdelete()'></a></td>
                        </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="table" style="filter: drop-shadow(10px 7px 10px rgb(48, 48, 46));">
                    <h3>Medications Table</h3>
                    <table class="content-table" style="width: 100%;" >
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Prescribed</th>
                                <th>Dosage</th>
                                <th>Side_Effects</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($result5)){
                            ?>
                            <td><?php echo $row['U_id']; ?></td>
                            <td><?php echo $row['Prescribed']; ?></td>
                            <td><?php echo $row['Dosage']; ?></td>
                            <td><?php echo $row['Side_Effects']; ?></td>
                            <td><a href='update2.php?U_id=<?php echo $row["U_id"]; ?>' class="e-button"><input type="submit" value="Update" class="update"></a></td>
                            <td><a href="delete2.php?T_id=<?php echo $row["U_id"]; ?>" class="d-button"><input type="submit" value="Delete" class="delete" onclick='return checkdelete()'></a></td>
                        </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="table" style="filter: drop-shadow(10px 7px 10px rgb(48, 48, 46));">
                    <h3>Appointments Table</h3>
                    <table class="content-table" style="width: 100%;" >
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Therapist ID</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Duration (min)</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($result9)){
                            ?>
                            <td><?php echo $row['U_id']; ?></td>
                            <td><?php echo $row['T_id']; ?></td>
                            <td><?php echo $row['Date']; ?></td>
                            <td><?php echo $row['Time']; ?></td>
                            <td><?php echo $row['Duration']; ?></td>
                            <td><a href='update3.php?U_id=<?php echo $row["U_id"]; ?>' class="e-button"><input type="submit" value="Update" class="update"></a></td>
                            <td><a href="delete3.php?T_id=<?php echo $row["U_id"]; ?>" class="d-button"><input type="submit" value="Delete" class="delete" onclick='return checkdelete()'></a></td>
                        </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </section>

        
</body>
</html>