<html>
    <head>
        <title>Painting</title>
    <style>
:root {
    --second-bg-color: #202020;
    --text-color: #fff;
}
      
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

.form {
    max-width: 95%;
    margin: 20px auto;
    padding: 20px;
    background: var(--second-bg-color);
    color: var(--text-color);
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.frm {
    width: 70%;
    height: 80%;
    padding: 20px;
    background: var(--second-bg-color);
    color: var(--text-color);
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}
.providers
{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
}
.img1 {
    width: 80%;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border: solid 20px;
    border-color:white;
}
div {
    margin-top: 20px;
}
ul {
    padding: 0;
}

li {
    margin-bottom: 5px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.info{
    margin-left:50px;
}
    </style>
    </head>
    <body>
        <form action="" method="post" class="form">
        <h1 style="color: #fff; font-size:50px;">Plumbing</h1><br>
            <img src="Images/Plumber.jpg" class="img1"><br>
            <div class="info">
                <ul>
                    <li>Work Properly</li>
                    <li>Clean & Safe</li>
                    <li>Water proof</li>
                </ul>
            </div>
        </form>
        <?php
        if(!session_start())
        {
            session_start();
        }
            include ("dbconnect.php");
            $sql="SELECT * FROM `bussiness_acc_data` WHERE `Bussiness`='plumbing'";
            $result=mysqli_query($conn,$sql);
            $rows=mysqli_num_rows($result);
            if($rows>0)
            {echo "<div class='providers'>";
                for($i=1;$i<=$rows;$i++){
                    $row_data=mysqli_fetch_assoc($result);
                    $mobile_no[$i]=$row_data['Mobile_No.'];
                    $name[$i]=$row_data['Name'];

                    $sql1="SELECT * FROM `price` WHERE `Mobile_No.`='$mobile_no[$i]'";
                    $result1=mysqli_query($conn,$sql1);
                    $row=mysqli_num_rows($result);
                    if($row>0){
                        $row_data1=mysqli_fetch_assoc($result1);
                        $price[$i]=$row_data1['Cost'];
                    }
                    ?>
                <form method="post" class="frm" >
            
            <?php
                echo "Hello, I am ".$name[$i]."<br>";  
                echo" Contact Me...        <div style='width:60px; height:60px;'><a href='https://wa.me/91$mobile_no[$i]'><img src='WhatsApp_icon.png' style='width:60px; height:60px;'></a>  </div>";
                echo "<br><a href='tel:+91$mobile_no[$i]' style='color: #fff;'>$mobile_no[$i]</a> ";
                echo "<br><button  class'Buy_Service'  name='Buy_Service$i'>Buy Your Service</h6></button>";
                if($price>0){
                    echo "<br>Service start from $price[$i]";
                }
                echo "<br><a style='color: #fff;' href='Feedbacks.php?mobile=$mobile_no[$i]' class='btn'>See Feedback</a>";
            ?>  
             
                
            </form>
        
         <?php  
        
        if(isset($_POST['Buy_Service'.$i]))
        {
             if(isset($_SESSION['Name']))
             {
                 $phone=$_SESSION['Mobile_No.'];
                 $sql1="INSERT INTO `purches_details`(`Provider_mobile`, `User_mobile`) VALUES ('$mobile_no[$i]','$phone')";
                 $result1=mysqli_query($conn,$sql1);
            
                 
             }
             else
             {
                 $alert = "<script>alert('Please, Login First');</script>";
                 echo $alert;
             }
             
         }   
        } 
            echo "</div>"; 
        }
         
        ?>
    </body>
</html>

