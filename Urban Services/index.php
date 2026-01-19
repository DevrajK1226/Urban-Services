<?php
    include("nevbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Design</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded: opsz,wght, FILL, GRAD@48,400,0,0">
    <link rel="stylesheet" href="style.css">
    <script src="script_files/script.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
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

.ser1{
    border: solid;
    border-radius: 10px;
    width:20%;
}       
.services{
    padding:15px;
}
.service{
    background: var(--bg-color);
}
</style>
<body>
    
        <div class="info" style="color: #000;">
            Hello,<br>
            Welcome to Urban Home Services <br>
            We provide the Home related services like,Home Painting,Electrition.<br>
            Also we have price pakaging.
        </div> 
        <br>
        <form class="services" style="width: 100%; height: 550px;">
        <h1 style="color: gold">Services</h1>    
        <a href="Painting.php" style="text-decoration: none; color: #000;"><div name="service">
            <img class="ser1" src="home-painting.png">
            <br>
            <p ><h1 style="font-size:50px;">Home Painting</h1></p>
            </div>
        </a>
          
        <br><br><br><br><br><br><br>
        <a href="Plumber.php" style="text-decoration: none; color: #000;"> <div name="service" >
            <img class="ser1" src="Plumber.jpg">
            <br>
            <p ><h1 style="font-size:50px;">Plumber</h1></p>
            </div> 
        </a>
           
        <br><br><br><br><br><br><br>
        <a href="Electrition.php" style="text-decoration: none; color: #000;"><div name="service"  >
            <img class="ser1" src="electrician.jpg">
            <br>
            <p ><h1 style="font-size:50px;">Electrition</h1></p> 
            </div>
        </a>  
         
        
        
    </form>
    <br><br><br><br><br><br><br><br><br><br><br>
        <div class="contact" style="  background: var(--second-bg-color); color: var(--text-color);">
            <h1 style="color: gold;">Contact</h1>
            <p class="contact_details"  style="text-size:10px;">
                contact no: 1234567890<br>
                email: urbanservices@gmail.com<br>
                toll free number: 12345678901
            </p>
        </div>
        

</body>
</html>