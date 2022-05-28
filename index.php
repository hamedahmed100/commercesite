
<?php session_start();  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION['logedIn'])) // If session is not set then redirect to Login Page
    {
        header("Location:loginui.php");
    }
    ?>

    <h1 class="header">الطلاب</h1>
    <a href='logout.php'> Logout</a>
    <title>Search</title>
    
        <div class="message"> <span>مسموح فقط بلارقام والحروف العربيه والانجليزيه</span></div>

        <div class="box">


            <input type="text" class="input" name="txt" onclick="activate(event)" onfocusout="deactivate(event)">

            <i class="fas fa-search"></i>
        </div>
  


    <table class="table">
        <thead></thead>
        <tbody></tbody>
    </table>
    <div id="snackbar">... جارى تحميل المذيد من البيانات</div>
    <script src="script.js"></script>


</html>