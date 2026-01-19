<?php
//Connect to database
$servername="localhost";
$username="root";
$password="";
$database="urban_services";

//create connection
$conn1 = mysqli_connect($servername,$username,$password);


//create Databse
// $sql="CREATE DATABASE urban_services";
// $result=mysqli_query($conn1,$sql);

$conn = mysqli_connect($servername,$username,$password,$database);
//create table 'bussiness_acc_data'
$sql1="CREATE TABLE `bussiness_acc_data`(`Name` VARCHAR (100) NOT NULL, `Password` VARCHAR (20), `Address` VARCHAR (200), `Mobile_No.` BIGINT (10), `Age` INT (3), `Bussiness` VARCHAR (50))";
$result1=mysqli_query($conn,$sql1);

// //create table 'user_acc_data'
$sql2="CREATE TABLE `user_acc_data`(`Name` VARCHAR (100) NOT NULL, `Password` VARCHAR (20), `Address` VARCHAR (200), `Mobile_No.` BIGINT (10), `Age` INT (3))";
$result2=mysqli_query($conn,$sql2);

// //create table Purches_Service
$sql3="CREATE TABLE `Purches_Details`(`Provider_mobile` BIGINT (10) NOT NULL, `User_mobile` BIGINT (10) NOT NULL)";
$result3=mysqli_query($conn,$sql3);

// //create table Price
$sql4="CREATE TABLE `Price`(`Mobile_No.` BIGINT (10) NOT NULL, `Cost` BIGINT (10) NOT NULL)";
$result4=mysqli_query($conn,$sql4);

//create table feedback
$sql5="CREATE TABLE `feedback`(`From` VARCHAR (100) NOT NULL, `To` VARCHAR (100) NOT NULL, `Feedback` VARCHAR (200) NOT NULL, `Rating` VARCHAR (20) NOT NULL, `A1` VARCHAR (200), `A2` VARCHAR (200), `A3` VARCHAR (200), `A4` VARCHAR (200), `A5` VARCHAR (200))";
$result5=mysqli_query($conn,$sql5);
?>