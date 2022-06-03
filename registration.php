<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            align-items: center;
            align-content: center;
        }
        * {
            box-sizing: border-box;
        }
        .logo {
            max-width: 200px;
        }
        .logo span {
            color: brown;
        }
        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
            border-radius: 25px;
        }
        /* Full-width input fields */
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
            border-radius: 15px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            background-color: #ddd;
            outline: transparent;
        }
        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04aa6d;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            border-radius: 15px;
        }
        .registerbtn:hover {
            opacity: 1;
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
            justify-content: flex-end;
        }
    </style>
    <title>تسجيل طالب جديد</title>
</head>
<body dir="rtl">
    <nav class="navbar">
        <h3 class="logo">MR - <span>Gouda</span></h3>
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
    <script type="text/javascript" src="scripts/registration.js"></script>
</body>
</html>