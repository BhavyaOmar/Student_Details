<?php 
 include('connection.php');

 if(isset($_POST['edit'])){
        
        $sql = "SELECT * FROM `details` WHERE `id` =". $_POST['edit'];
        $Q = $conn->query($sql);
        $Q = mysqli_fetch_array($Q);

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
     <h2 style="text-align: center; text-decoration : underline;">Student Details</h2>

    <form action="index.php" method="post" style="background-color: purple; padding:20px; color:white; display:flex; justify-content:space-around; margin:10px">
        <div>Name <input type="text" value= "<?=$Q['name']?>" name="name"></div>
        <div>DOB <input type="date" value= "<?=$Q['dob']?>" name="dob"></div>
        <div>Mobile No. 
        <input type="hidden" value = "<?=$Q['id']?>" name="id">    
        <input type="text" value= "<?=$Q['mobile']?>" name="mobile"></div>
        <input type="submit">

    </form>

    
</body>
</html>