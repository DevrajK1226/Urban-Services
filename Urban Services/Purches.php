<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
</style>
</head>
<body>
  
</body>
</html>
<?php
    session_start();
    include("dbconnect.php");
    if(isset($_SESSION['Name']))
    {
        $mobile=$_SESSION['Mobile_No.'];
		echo "<h1>Order's</h1>";
		
		
		$sql="SELECT * FROM `purches_details` WHERE `User_mobile`='$mobile'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($result);
		if($row>0)
		{ 
    ?>
    <form method="post">
			<table class='table'>
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Mobile_No.</th>
                      <th>Service</th>
                    <tr>
                </thead>
		<?php }
		for($i=1;$i<=$row;$i++)
		{
			$row_data=mysqli_fetch_assoc($result);
			$provider_mobile=$row_data['Provider_mobile'];
			 $_SESSION['Mobile_No.1']=$provider_mobile;
      
			$sql1="SELECT * FROM `bussiness_acc_data` WHERE `Mobile_No.`='$provider_mobile'";
			$result1=mysqli_query($conn,$sql1);
			$row_data1=mysqli_fetch_assoc($result1);
                        $name=$row_data1['Name'];
                        $address=$row_data1['Address'];
                        $phone=$row_data1['Mobile_No.'];
                        $service=$row_data1['Bussiness'];
                        echo "
                        </tbody>
                        <tr>
                        <td>". $name." </td>
                        <td>".$address ."</td>
                        <td>".$phone ."</td>
                        <td>". $service."</td>
                        <td><a href='feedback.php'>Feedback</a></td>
                        <td><button name='cancel$i' style='background-color: rgba(0, 0, 0, 0.5); color: #fff;'>Cancel Order</button></td>
                        </tr>";
                        if(!isset($_SESSION['Bussiness1']))
                        {
                            $_SESSION['Bussiness1']=$service;
                        }
					
            if(isset($_POST['cancel'.$i])){
              
              $sql2="DELETE FROM `purches_details` WHERE `Provider_mobile`='$phone' and `User_mobile`='$mobile'";
              $result2=mysqli_query($conn,$sql2);
              if($result2)
              {
                $alert = "<script>alert('Oredr Canceled Successfully');</script>";
                echo $alert;
                sleep(5);
                header("location: Purches.php");
              }
            }
		}
	?>
	</tbody>
  </table>
  </form>
  <?php  }
  else
  {
    header("location:index.php");
  }

?>

