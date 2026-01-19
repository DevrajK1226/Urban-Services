<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Feedback</title> 
        <style> 
        body { 
            font-family: Arial, sans-serif;
             margin: 0;
              padding: 0;
              background-color: #f4f4f4;
            } 
        textarea { width: 80%;
            margin: 20px ; 
            padding: 10px; 
            font-size: 16px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        } 
        input[type="text"] { width: 80%;
            margin: 20px ; 
            padding: 10px; 
            font-size: 16px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        } 
        input[type="radio"] { 
            margin: 20px; 
        }
        input[type="submit"] {
            width: 10%;
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
    <body> 
        <form method="post">
            
            
            
            <label name="q1">Did you find our employees to be kind and helpful?</label><br>
            <input type="text" name="a1" placeholder="your answer" require><br><br>
            <label name="q2">How was the Service given by provider?</label><br>
            <input type="text" name="a2" placeholder="your answer" require><br><br>
            <label name="q3">What is the behavior of provider? </label><br>
            <input type="text" name="a3" placeholder="your answer" require><br><br>
            <label name="q4">Is there anything you did not get that you expected?</label><br>
            <input type="text" name="a4" placeholder="your answer" require><br><br>
            <label name="q5">How was the overall experience with the provider?</label><br>
            <input type="text" name="a5" placeholder="your answer" require><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body> 
</html>
<?php
session_start();
include("dbconnect.php");
$mobile=$_SESSION['Mobile_No.'];
$mobile1=$_SESSION['Mobile_No.1'];
if($_POST){
    
    $a1=$_POST['a1'];
    $a2=$_POST['a2'];
    $a3=$_POST['a3'];
    $a4=$_POST['a4'];
    $a5=$_POST['a5'];
    $sql="INSERT INTO `feedback`(`From`, `To`, `A1`, `A2`, `A3`, `A4`, `A5`) VALUES ('$mobile','$mobile1','$a1','$a2','$a3','$a4','$a5')";
    $result=mysqli_query($conn,$sql);
    $alert = "<script>alert('Thank You for Feedback');</script>";
    echo $alert;
    
}
?>