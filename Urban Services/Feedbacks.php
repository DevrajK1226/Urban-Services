<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>
<?php
    session_start();
    include("dbconnect.php");
    $mobile = $_GET['mobile'];
    $sql="SELECT * FROM `feedback` WHERE `To`='$mobile'";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($result);
    if($rows>0)
    {
        ?>
        
            <?php
        for($i=1;$i<=$rows;$i++){
            $row_data=mysqli_fetch_assoc($result);
            $a1=$row_data['A1'];
            $a2=$row_data['A2'];
            $a3=$row_data['A3'];
            $a4=$row_data['A4'];
            $a5=$row_data['A5'];
            $from=$row_data['From'];
            $sql1="SELECT * FROM `user_acc_data` WHERE `Mobile_No.`='$from'";
            $result1=mysqli_query($conn,$sql1);
            $row1=mysqli_num_rows($result1);
            if($row1==1){
                $row_data1=mysqli_fetch_assoc($result1);
                $name=$row_data1['Name'];
            }
            ?>
            
            <?php
            echo "<b>$name<br></b>";

            echo "<br>Q1.Did you find our employees to be kind and helpful?";
            echo "<br>Ans:$a1";
            echo "<br><br>Q2.How was the Service given by provider?";
            echo "<br>Ans:$a2";
            echo "<br><br>Q3.What is the behavior of provider? ";
            echo "<br>Ans:$a3";
            echo "<br><br>Q4.Is there anything you did not get that you expected?";
            echo "<br>Ans:$a4";
            echo "<br><br>Q5.How was the overall experience with the provider?";
            echo "<br>Ans:$a5";
        }
        ?>
        
        <?php
    }
?>