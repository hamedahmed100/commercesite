<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>تسجيل طالب جديد</title>
</head>

<body dir="rtl">
    <nav class="navbar">
        <div>
            <button id="menu-toggler" data-class="menu-active" class="hamburger">
                <span class="hamburger-line hamburger-line-top"></span>
                <span class="hamburger-line hamburger-line-middle"></span>
                <span class="hamburger-line hamburger-line-bottom"></span>
            </button>
            <!--  Menu compatible with wp_nav_menu  -->
            <ul id="primary-menu" class="menu nav-menu">
                <li class="menu-item dropdown">
                    <a class="nav__link" href="#">
                        username
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </a>
                    <ul class="sub-nav">
                        <li><a class="sub-nav__link" href="reset.html">تغيير كلمة المرور</a></li>
                        <li><a class="sub-nav__link" href="index.html">تسجيل الخروج</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a class="nav__link" href="allSdutents.html">بيانات الطلاب</a></li>
                <li class="menu-item current-menu-item"><a class="nav__link" href="Registration.html">إضافة طالب</a></li>
            </ul>
        </div>
        <input class="search" type="text" name="search" placeholder="Search.." />
        <div class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/2/23/AS_sample_logo.png" alt="LOGO" /></div>
    </nav>
    <form action="regestrationSubmit.php" method="POST">
        <div class="container">
            <h1>تسجيل الطلاب</h1>
            <p>من فضلك املأ هذه البيانات</p>
            <hr />
            <label for="fullname"><b>الاسم بالكامل</b></label>
            <input pattern="^[\u0621-\u064A0-9a-zA-Z ]*$" type="text" placeholder="ادخل الاسم" name="fullname" id="fullname" required oninvalid="this.setCustomValidity('مسموح بحروف والارقام العربيه والانجليزيه فقط') " oninput="this.setCustomValidity('') " />

            <label for="email"><b>البريد الالكترونى</b></label>
            <input type="email" placeholder="ادخل البريد الالكترونى" name="email" id="email" required oninvalid="this.setCustomValidity('ادخل بريد الكترونى صحيح') " oninput="this.setCustomValidity('') "/>

            <label for="phone"><b>رقم المحمول</b></label>
            <input oninvalid="this.setCustomValidity('ادخل رقم تليفون صحيح و مكون من 11 رقم') " oninput="this.setCustomValidity('')" pattern="^01\d{9}$" type="text" placeholder="ادخل رقم المحمول" name="phone" id="phone" required />

            <label for="guardian"><b>رقم محمول ولى الامر</b></label>
            <input  oninvalid="this.setCustomValidity('ادخل رقم تليفون صحيح و مكون من 11 رقم') " oninput="this.setCustomValidity('')"  pattern="^01\d{9}$" required type="text" placeholder="ادخل رقم ولى الامر" name="guardian" id="guardian"  />

            <label for="governorate"><b>المحافظة</b></label>
            <input oninvalid="this.setCustomValidity('مسموح بحروف والارقام العربيه والانجليزيه فقط') " oninput="this.setCustomValidity('') " pattern="^[\u0621-\u064A0-9a-zA-Z ]*$"  type="text" placeholder="ادخل المحافظه" name="governorate" id="governorate" required />

            <label for="stage"><b>المرحله</b></label>
            <select id="stage" name="stages" required oninvalid="this.setCustomValidity('يجب ادخال المرحله')" oninput="this.setCustomValidity('')">
                <option value="" disabled selected hidden>----- اختر المرحله -----</option>

            </select>

            <label for="group"><b>المجموعه</b></label>
            <select id="group" name="groups" required oninvalid="this.setCustomValidity('يجب ادخال اسم المجموعه') " oninput="this.setCustomValidity('')">
                <option value="" disabled selected hidden>----- اختر المجموعة -----</option>
            </select>
            <button type="submit" name="create" class="registerbtn">تسجيل</button>
        </div>
    </form>

</body>

<script type="text/javascript" src="scripts/registration.js"></script>



</html>