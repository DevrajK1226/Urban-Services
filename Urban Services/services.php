<?php
    include "nevbar.php";
    include "dbconnect.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        
:root {
    --bg-color: #2a2a2a;
    --second-bg-color: #202020;
    --text-color: #fff;
    --second-color: #ccc;
    --main-color: #05b4ff;
    --big-font: 5rem;
    --h2-font: 3rem;
    --p-font: 1.1rem;
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

.services{
    /* background: var(--second-bg-color);
    color: var(--text-color); */
    padding:15px;

}
.ser1{
    border: solid;
    border-radius: 10px;
    width:20%;
}       
input[type="text"] {
    width: 200px;
    padding: 10px;
    margin: 5px 0;
}
            input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            /* background-color: #4CAF50; */
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
    <br><br><br><br>
<form action="" method="POST">
        <input type="text" name="search"  list="input" placeholder="search the service you need" style="width: 55%; heigth: 20px; margin-left: 15%; border-radius: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 10);">
        <datalist id="input">
            <option value="painting">painting</option>
            <option value="plumbing">plumbing</option>
            <option value="carpentry">carpentry</option>
            <option value="electrical">electrical</option>
        </datalist>
        <input type="submit" name="submit" value="Search" style="width:10%; margin-left:0%; border-radius: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 10);"/>
        
    </form>
    <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){    
                if(isset($_POST['submit']))
                {
                    
                    $service=$_POST['search'];
                    $_SESSION['search']=$service;
                    echo "<script>window.open('Search_Display.php','New Window','width=510, height=510, left=500, top=100')</script>";
                }
            }
    ?>
    
    
    <form class="services" style="width: 100%; height: 700px; ">
        <h1 style="color: gold;">Services</h1>    
        <a href="Painting.php" style="text-decoration: none; color: #000;"><div name="service" >
            <img class="ser1" src="home-painting.png">
            <br>
            <p ><h1>Home Painting</h1></p>
            </div>
        </a>
          
        <br><br><br><br><br><br><br><br>
        <a href="Plumber.php" style="text-decoration: none; color: #000;"> <div name="service" >
            <img class="ser1" src="Plumber.jpg">
            <br>
            <p ><h1>Plumber</h1></p>
            </div> 
        </a>
           
        <br><br><br><br><br><br><br><br>
        <a href="Electrition.php" style="text-decoration: none; color: #000;"><div name="service"  >
            <img class="ser1" src="electrician.jpg">
            <br>
            <p ><h1>Electrician</h1></p> 
            </div>
        </a>  
         
        <br><br><br><br><br><br>
        <a href="Carpentry.php" style="text-decoration: none; color: #000;"><div name="service"  >
            <img class="ser1" src="Carpentry.jpg">
            <br>
            <p ><h1>Carpentry</h1></p>
            </div>
        </a>
    </form>
        
</body>
</html>
