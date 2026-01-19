<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}
form {
    width: 300px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}
input[type="text"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #45a049;
}
center {
    margin-top: 50px;
}
    </style>
</head>
<body>
    <center>
        <form method='post'>
            <input type="text" name="old_Password" placeholder="Old Password"><br><br>
            <input type="text" name="new_Password" placeholder="New Password"><br>
            <input type="text" name="c_Password" placeholder="Conferm Password"><br>
            <input type="submit" name="submit" value="Change">
        </form>
    </center>
</body>
</html>
<?php
    include ("dbconnect.php");
    if($_POST)
    {
        $old_P=$_POST['old_Password'];
        $new_P=$_POST['new_Password'];
        $c_pass=$_POST['c_Password'];
        if(!empty($old_P) and !empty($new_P) and !empty($c_pass))
        {
            if($new_P==$c_pass)
            {
                $sql="SELECT * FROM `user_acc_data` WHERE `Password`='$old_P'";
                $result=mysqli_query($conn, $sql);
                $row=mysqli_num_rows($result);
                if($row==1)
                {
                    $sql1="UPDATE `user_acc_data` SET `Password`='$new_P' WHERE `Password`='$old_P'";
                    $result1=mysqli_query($conn,$sql1);
                    
                    if($result1)
                    {
                        $alert = "<script>alert('Password Updated');</script>";
                        echo $alert;
                    }
                    else
                    {
                        $alert = "<script>alert('Failed to Update Password');</script>";
                        echo $alert;
                    }
                }
                else
                {
                    $alert = "<script>alert('Don't have account with Password $old_P');</script>";
                    echo $alert;
                }
            }
            else
            {
                $alert = "<script>alert('Enter same Password for New Password & Conform Password');</script>";
                echo $alert;
            }
        }
        else
        {
            $alert = "<script>alert('Please Fill the all fields');</script>";
            echo $alert;
        }

    }
?>