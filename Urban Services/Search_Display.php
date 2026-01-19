<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
            table thead tr {
                background-color: lightgray;
            }
            
    </style>
</head>
</html>
<?php
include "dbconnect.php";

if(isset($_SESSION['search'])){
    $a=$_SESSION['search'];
    $sql="SELECT * FROM `bussiness_acc_data` WHERE `Bussiness`='$a'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_num_rows($result);
    if($row>0) {
        
    ?>
    
    <table class='table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile No.</th>
                <th>Service</th>
            <tr>
        </thead>
        <?php
            while($row>0) {
                $row_data=mysqli_fetch_assoc($result);
                $name=$row_data['Name'];
                $address=$row_data['Address'];
                $phone=$row_data['Mobile_No.'];
                $service=$row_data['Bussiness'];
                        
        echo "
        </tbody>
            <tr>
                <td>". $name." </td>
                <td>".$address ."</td>
                <td>".$phone ."</td>
                <td>".$service."</td> 
            </tr>";
            $row=$row-1;
            }
        }
        else
        {
            $alert = "<script>alert('No Provider are Available');</script>";
            echo $alert;
        }?>      
        </tbody>
    </table>
<?php } ?>
