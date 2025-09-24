<?php
    
    $msg = "Welcome to the student details page.";

    include('connection.php');

    // Create
    if(isset($_POST['name'])){

        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $mobile = $_POST['mobile'];

        $sql = "INSERT INTO `details`(`name`, `dob`, `mobile`) VALUES ('$name', '$dob', '$mobile')";
        
        if($conn->query($sql)){
            $msg = "Student created successfully !";
        }

        else{
            $msg = "Error :". $conn->error;
        }

        
    }

    //edit
    if(isset($_POST['id'])){

        $sql ="UPDATE `details` SET `name`= '$_POST[name]' ,`dob`='$_POST[dob]',`mobile`='$_POST[mobile]' WHERE `id` = '$_POST[id]'";
        
        if($conn->query($sql)){
            $msg = "Record updated successfully !";
        }

        else{
            $msg = "Error :". $conn->error;
        }
    }

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM `details` WHERE `id` =".$_POST['delete'];
        if($conn->query($sql)){
            $msg = "Record deleted successfully !";
        
        }

        else{
            $msg = "Error :". $conn->error;
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        th,td{
            padding:5px;
            color: white;
        }
        button{
            border: none;
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>
    <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h2 style="text-align: center; text-decoration : underline;">Student Details</h2>

<form action="index.php" method="post" style="background-color: purple; padding:20px; color:white; display:flex; justify-content:space-around; margin:10px">
    <div>Name <input type="text" name="name"></div>
    <div>DOB <input type="date" name="dob"></div>
    <div>Mobile No. <input type="text" name="mobile"></div>
    <input type="submit">
</form>

<h3 style="background-color: yellow; text-align:center; width:500px; padding:10px; border: 1px solid black; border-radius:30px; margin = 10px auto;"><?=$msg ?></h3>
    <table style="width: 100%">
        <thead style="background-color: grey;">
            <tr  >
                <th>S No.</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody style="background-color: #30AAAD; text-align:center">
            <?php
            
            // Read
                $sno =1;
                $Q = "SELECT * FROM `details`";
                $Q = mysqli_query($conn, $Q);
                while($result = mysqli_fetch_array($Q)){

                    echo "<tr >";
                    echo "<td>".$sno++."</td>";
                    echo "<td>".$result['name']."</td>";
                    echo "<td>".$result['dob']."</td>";
                    echo "<td>".$result['mobile']."</td>";
                    echo "<td>
                    
                        <form method = 'post' action= 'edit.php'>
                        <input type = 'hidden' name = 'edit' value = '" . $result['id'] . "' > 
                        <button type = 'submit'style = 'background-color:green; color:white;'>Edit</button>
                        </form>
                        <form method = 'post' action= 'delete.php'>
                        <input type = 'hidden' name = 'delete' value = '" . $result['id'] . "' > 
                        <button type = 'submit' style = 'background-color:red; color:white;'>Delete</button>
                        </form>
                        </td>";
                    echo "</tr>";
                }

            ?>
            
        </tbody>
    </table>
</body>
<script>
    console.log($);
</script>
</html>