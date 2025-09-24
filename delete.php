<?php

include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>Do you sure wanna delete the record?</h1>
    
    <form action="index.php" method="post">
        <input type="hidden" value="<?=$_POST['delete']?>" name = "delete">
        <button>YES</button>
    </form>
    <form action="index.php">
        <button>NO</button>
    </form>
</body>
</html>