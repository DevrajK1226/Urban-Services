<?php
include("dbconnect.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST["name"];
    $pass=$_POST["password"];
    $address=$_POST["address"];
    $mobile=$_POST["mobile"];
    $age=$_POST["age"];
    
    if($age>18){
        if(strlen($pass)>=6 and strlen($pass)<=16)
        {
            if(strlen((string)$mobile)==10)
            {
                $sql="SELECT * FROM `user_acc_data` WHERE `Mobile_No.`='$mobile'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)==0)
                {
                    $sql="SELECT * FROM `user_acc_data` WHERE `Name`='$username' and `Password`='$pass'";
                    $result=mysqli_query($conn, $sql);
                    $row=mysqli_num_rows($result);
                    
                    if ($row!=1) {
                        $row_data=mysqli_fetch_assoc($result);
                        $_SESSION['Name']=$row_data['Name'];
                        
                        $sql="INSERT INTO `user_acc_data`(`Name`, `Password`, `Address`, `Mobile_No.`, `Age`) VALUES ('$username','$pass','$address','$mobile','$age')";
                        mysqli_query($conn, $sql);
                        header("location:index.php");
                    }
                    else{
                        $alert = "<script>alert('You alredy have an account');</script>";
                        echo $alert;
                        
                    } 
                }
            else
            {
                $alert = "<script>alert('Try new Mobile No.');</script>";
                echo $alert;
            }    
            }
            else
            {
                $alert = "<script>alert('Invalid Mobile No.');</script>";
                echo $alert;
            }
        }
        else
        {
            $alert = "<script>alert('Password Length must be 6 to 16');</script>";
            echo $alert;
        }
    }
    else
    {
        $alert = "<script>alert('Age is not support');</script>";
        echo $alert;
    }
   
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        html, body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    background-attachment: fixed; /* optional */
    min-height: 100vh;
}
/* @media (max-width: 768px) {
    body {
        background-attachment: scroll;
    }
} */
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            border: solid;
            border-radius: 7px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: rgb(0, 0, 0);
            border: none;
            cursor: pointer;
            border: solid;
            border-radius: 7px;
        }
        label{
            color: beige;
        }
        .form{
            border:solid;
            border-color:black;
            border-radius:10px;
            padding: 50px;
            background:gray;
            width: 300px;
            margin: 0 auto;
            margin-top:50px;
        }
    </style>
</head>
<body>
    <form method="POST" class="form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <br><br>

        <label for="mobile">Mobile No:</label>
         <input type="number" id="mobile" name="mobile" required>
         <br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br><br>

        <input type="submit" value="Register">
        <br>

    </form>
</body>
</html>