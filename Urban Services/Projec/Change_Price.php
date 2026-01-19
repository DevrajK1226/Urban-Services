<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price</title>
    <style>
        input[type="number"] {
    width: 70%;
    padding: 10px;
    margin: 5px 0;
}
            input[type="submit"] {
            width: 70%;
            padding: 10px;
            margin-top: 10px;
            color: black;
            border: none;
            cursor: pointer;
            border: solid;
            border-radius: 7px;
        } 
        input[type="submit"]:hover{
            background-color: #4CAF50;
            color:white;
        }    
    </style>
</head>
<body><center>
    <form method="post">
        <input type="number" name="price" placeholder="Service coast"><br>
        <input type="submit" name="set" value="Set">
    </form>
    </center>
    <?php 
        include("dbconnect.php");
        session_start();
        $mobile_no=$_SESSION['Mobile_No.1'];
        if(isset($_POST['set']))
        {
            $price=$_POST['price'];
            echo $price;
            if($price>0)
            {
                $sql="SELECT * FROM `price` WHERE `Mobile_No.`='$mobile_no'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_num_rows($result);
                if($row==0){
                    $sql1="INSERT INTO `price`(`Mobile_No.`, `Cost`) VALUES ('$mobile_no','$price')";
                    $result1=mysqli_query($conn,$sql1);
                    header("location:index.php");
                }
                else{
                    $sql2="UPDATE `price` SET `Cost`='$price' WHERE `Mobile_No.`='$mobile_no'";
                    $result2=mysqli_query($conn,$sql2);
                }
                
            }
        }
    ?>
</body>
</html>