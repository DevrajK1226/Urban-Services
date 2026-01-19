<?php
session_start();
if(isset($_POST['btnBussiness'])){
    header("location:Bussiness_Registration_form.php");
}

if(isset($_POST['btnUser'])){
    header("location:User_Registration_form.php");
}
include("dbconnect.php");

if(isset($_POST['Login'])){
    $username=$_POST["username"];
    $pass=$_POST["password"];
    
    $sql="SELECT * FROM `bussiness_acc_data` WHERE `Name`='$username' and `Password`='$pass'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_num_rows($result);
    //echo "$row";
    if ($row==1) {
        $row_data=mysqli_fetch_assoc($result);
        $_SESSION['Name1']=$row_data['Name'];
        $_SESSION['Address1']=$row_data['Address'];
        $_SESSION['Mobile_No.1']=$row_data['Mobile_No.'];
        $_SESSION['Bussiness1']=$row_data['Bussiness'];
        header("location: Projec/index.php");
    } 
    else{
        $sql="SELECT * FROM `user_acc_data` WHERE `Name`='$username' and `Password`='$pass'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_num_rows($result);
        //echo "$row";
        if ($row==1) {
            $row_data=mysqli_fetch_assoc($result);
            $_SESSION['Name']=$row_data['Name'];
            $_SESSION['Address']=$row_data['Address'];
            $_SESSION['Mobile_No.']=$row_data['Mobile_No.'];
            header("location: index.php");
        } 
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nevbar</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded: opsz,wght, FILL, GRAD@48,400,0,0">
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .login-btn:hover{
                background-color: #4CAF50;
            color:white;
            }
            
        </style>
        
    </head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <body>
        <header style="background-color:#2a2a2a;">
            <nav class="navbar" style="background-color:#2a2a2a;">
            <span class="menu-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
            <img src="logo1.png" alt="logo">
            <h2>Urban Services</h2>
            </a>
            <ul class="links">
            <span class="close-btn material-symbols-rounded">close</span>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="about_us.php">About us</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a href="Purches.php">My Order's</a></li>
            </ul>
            <?php if(isset($_SESSION['Name'])){?>
            <a href="Logout.php"><button class="logout-btn" >Logout</button></a>
            <?php } else{ ?>
            <button class="login-btn" >Sign-Up / Login</button>
            <?php }?>
            <!-- <button class="orders">My Order's</button> -->
            </nav>
        </header>
        <div class="blur-bg-overlay"></div>
        <div class="form-popup">
            <span class="close-btn material-symbols-rounded">close</span>
            <div class="form-box login">
                <div class="form-details">
                    <h2>Welcome Back</h2>
                    <p>Please log in with using person information</p>
                </div>
                <div class="form-content" o>
                    <h2>LOGIN</h2>
                    <form action="#" method="post">
                        <div class="input-field">
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>

                        <a href="forgot.php" class="forgot-pass">Forgot password</a>
                      
                      <button class="Login" id="Login" name="Login">Log In</button>

                    </form>
                    <div class="bottom-link">
                        Dont have an account?
                        <a href="#" id="signup-link">Sign-up</a>
                    </div>
                </div>
            </div>
            <div class="form-box signup">
                <div class="form-details">
                    <h2>Create Account</h2>
                    <p>To be part our community, plese signup using personal information</p>
                </div>
                <div class="form-content">
                    <h2>SIGNUP</h2>
                    <form action="#" method="post" >
                        <div class="input-field">
                            <button  class="btnBussiness" id="btnBussiness" name="btnBussiness"><h3>Business Account</h3><n><h6>Create youe Business Account</h6></button>
                            
                        </div>
                        <br> <br> 
                        <div class="input-field">
                        <button  class="btnUser" id="btnUser" name="btnUser"><h3>User Account</h3><n><h6>Create youe User Account</h6></button>
                        </div>
                        <br><br><br><br>
                    </form>
                    <div class="bottom-link">
                        Alerady have an account?
                        <a href="#" id="login-link">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>