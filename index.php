<?php session_start();  ?>
<?php
    if (!isset($_SESSION['logedIn']))
    { 
       header("Location:loginui.php",'_self');
       // die();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيانات الطلاب</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            background-color: #ccc;
            color: #272727;
            margin: 0;
            padding: 0px 25px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: flex-center;
            align-items: center;
            align-content: center;
        }
        * {
            box-sizing: border-box;
        }
        .container {
            padding: 16px;
            background-color: white;
            border-radius: 25px;
        }
        .search {
            border-radius: 8px;
            border-color: transparent;
            background: lightgray;
            height: 30px;
            width: 25%;
        }
        li button{
            border: none;
            background: none;
            color: green;
            cursor: pointer;
        }
        li button span{
            font-size: 17px;
        }
        .search:focus {
            border-color:green;
            outline:transparent;
        }
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
        /* snack bar*/
        #snackbar {
            visibility: hidden; /* Hidden by default. Visible on click */
            min-width: 250px; /* Set a default minimum width */
            margin-left: -125px; /* Divide value of min-width by 2 */
            background-color: #333; /* Black background color */
            color: #fff; /* White text color */
            text-align: center; /* Centered text */
            border-radius: 2px; /* Rounded borders */
            padding: 16px; /* Padding */
            position: fixed; /* Sit on top of the screen */
            z-index: 1; /* Add a z-index if needed */
            left: 50%; /* Center the snackbar */
            bottom: 30px; /* 30px from the bottom */
        }
        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
        button {
            cursor: hand;
        }
        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
            from {
            bottom: 0;
            opacity: 0;
            }
            to {
            bottom: 30px;
            opacity: 1;
            }
            }
            @keyframes fadein {
            from {
            bottom: 0;
            opacity: 0;
            }
            to {
            bottom: 30px;
            opacity: 1;
            }
            }
            @-webkit-keyframes fadeout {
            from {
            bottom: 30px;
            opacity: 1;
            }
            to {
            bottom: 0;
            opacity: 0;
            }
            }
            @keyframes fadeout {
            from {
            bottom: 30px;
            opacity: 1;
            }
            to {
            bottom: 0;
            opacity: 0;
            }
        }
        /* snack bar*/
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:nth-child(odd) {
            background-color: #8fd1b93a;
        }
        table tr:hover {
            background-color: #81c0aa;
        }
        tr:hover td {
            color: white;
        }
        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #038857;
            color: white;
        }
        tr {
            text-align: center;
        }
        .logo {
            max-width: 200px;
        }
        .logo span{
            color:brown;
        }
        .message span{
            display:none;
        }
        .message span.activ {
            color: brown;
            display: block;
        }
        .navbar {
            align-items: center;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: row;
            font-family: sans-serif;
            padding: 5px 15px;
            width: 100%;
            margin: 1rem;
            border-radius: 25px;
            justify-content: space-between;
        }
        .hamburger {
            background: transparent;
            border: none;
            cursor: pointer;
            display: none;
            outline: none;
            height: 30px;
            position: relative;
            width: 30px;
            z-index: 1000;
        }
        .hamburger-line {
            background: #272727;
            height: 3px;
            position: absolute;
            left: 0;
            transition: all 0.2s ease-out;
            width: 100%;
        }
        .hamburger:hover .hamburger-line {
            background: #777;
        }
        .hamburger-line-top {
            top: 3px;
        }
        .menu-active .hamburger-line-top {
            top: 50%;
            transform: rotate(45deg) translatey(-50%);
        }
        .hamburger-line-middle {
            top: 50%;
            transform: translatey(-50%);
        }
        .menu-active .hamburger-line-middle {
            left: 50%;
            opacity: 0;
            width: 0;
        }
        .hamburger-line-bottom {
            bottom: 3px;
        }
        .menu-active .hamburger-line-bottom {
            bottom: 50%;
            transform: rotate(-45deg) translatey(50%);
        }
        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            transition: all 0.25s ease-in;
        }
        @media screen and (max-width: 768px) {
            .nav-menu {
                background: #fff;
                flex-direction: column;
                justify-content: center;
                opacity: 0;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                transform: translatey(-100%);
                text-align: center;
            }
            .menu-active .nav-menu {
            transform: translatey(0%);
            opacity: 1;
            }
            .nav-menu .menu-item a {
            font-size: 20px;
            margin: 8px;
            }
            .sub-nav {
            position: relative;
            width: 100%;
            display: none;
            background-color: rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            }
            .hamburger {
            display: inline-block;
            }
            .logo {
            display: none;
            }
            .search {
            margin-right: 10px !important;
            }
        }
        .nav-menu .menu-item a {
            color: #444444;
            display: block;
            line-height: 30px;
            margin: 0px 10px;
            text-decoration: none;
            white-space: nowrap;
        }
        .nav-menu .menu-item a:hover {
            color: #777777;
            text-decoration: underline;
        }
        .sub-nav {
            border: 1px solid #ccc;
            display: none;
            position: absolute;
            background-color: #fff;
            padding: 5px 5px;
            list-style: none;
            width: 230px;
        }
        .nav__link:hover + .sub-nav {
            display: block;
        }
        .sub-nav:hover {
            display: block;
        }
    </style>
</head>
<body>
 
    <nav class="navbar" dir="rtl">
        <div>
            <button id="menu-toggler" data-class="menu-active" class="hamburger">
                <span class="hamburger-line hamburger-line-top"></span>
                <span class="hamburger-line hamburger-line-middle"></span>
                <span class="hamburger-line hamburger-line-bottom"></span>
            </button>
            <!--  Menu compatible with wp_nav_menu  -->
            <ul id="primary-menu" class="menu nav-menu">
                <li><button type="button" onclick="window.location='logout.php';"><span>تسجيل الخروج</span></button></li>
                <li><button type="button" id="export" onclick="exportTableToExcel('table')"><span>Export To Excel</button></span></li>
            </ul>
        </div>
        <div class="message"> <span>مسموح فقط بلارقام والحروف العربيه والانجليزيه</span></div>
        <input type="text" class="input search" name="txt" onclick="activate(event)" onfocusout="deactivate(event)" placeholder="ابحث هنا">
        <h3 class="logo">MR - <span>Gouda</span></h3>
    </nav>
    <table class="table" id="table">
        <thead></thead>
        <tbody></tbody>
    </table>
    <div id="snackbar">... جارى تحميل المذيد من البيانات</div>
    <script src="./script.js"></script>
</html>