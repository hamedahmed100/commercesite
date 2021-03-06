<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>            
        html {
                background-color: #ccc;
            }
        body {
            font-family: "Poppins", sans-serif;
            height: 100vh;
        }
        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
            padding: 20px;
        }
        #formContent {
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: #fff;
            padding: 30px;
            width: 90%;
            max-width: 450px;
            position: relative;
            padding: 0px;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        #formFooter {
            background-color: #f6f6f6;
            border-top: 1px solid #dce8f1;
            padding: 25px;
            text-align: center;
            -webkit-border-radius: 0 0 10px 10px;
            border-radius: 0 0 10px 10px;
        }
        button[type="submit"] {
            background-color: #04aa6d;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 80%;
            opacity: 0.8 !important;
            border-radius: 15px;
        }
        button[type="submit"]:hover {
            opacity: 1 !important;
        }
        input[type="text"],input[type="password"] {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }
        input[type="text"]:focus,input[type="password"]:focus {
            background-color: #fff;
            border-bottom: 2px solid #04aa6d;
        }
        input[type="text"]:placeholder ,input[type="password"]:placeholder{
            color: #cccccc;
        }
        /* ANIMATIONS */
        /* Simple CSS3 Fade-in-down Animation */
        .fadeInDown {
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @-webkit-keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
        /* Simple CSS3 Fade-in Animation */
        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @-moz-keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .fadeIn {
            opacity: 0;
            -webkit-animation: fadeIn ease-in 1;
            -moz-animation: fadeIn ease-in 1;
            animation: fadeIn ease-in 1;
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            animation-duration: 1s;
        }
        .fadeIn.first {
            -webkit-animation-delay: 0.4s;
            -moz-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }
        .fadeIn.second {
            -webkit-animation-delay: 0.6s;
            -moz-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }
        .fadeIn.third {
            -webkit-animation-delay: 0.8s;
            -moz-animation-delay: 0.8s;
            animation-delay: 0.8s;
        }
        .fadeIn.fourth {
            -webkit-animation-delay: 1s;
            -moz-animation-delay: 1s;
            animation-delay: 1s;
        }
        .underlineHover {
            color: #04aa6d;
            opacity: 0.5;
            display: inline-block;
            text-decoration: none;
            font-weight: 400;
        }
        /* Simple CSS3 Fade-in Animation */
        .underlineHover:after {
            display: block;
            left: 0;
            bottom: -10px;
            width: 0;
            height: 2px;
            background-color: #04aa6d;
            content: "";
            transition: width 0.2s;
        }
        .underlineHover:hover {
            color: #0d0d0d;
            opacity: 1;
        }
        .underlineHover:hover:after {
            width: 100%;
        }
        /* OTHERS */
        *:focus {
            outline: none;
        }
        * {
            box-sizing: border-box;
        }
        .login__submit {
        }
        .message {
        }
        .message span {
            display: none;
        }
        .message span.activ {
            display:block;
            color:brown;
        }
        h2.inactive {
            color: #cccccc;
        }
        h2.active {
            color: #0d0d0d;
            border-bottom: 2px solid #04aa6d;
        }
        h2 {
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            margin: 40px 8px 10px 8px;
            color: #cccccc;
        }
    </style>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2 class="active">تسجيل الدخول</h2>
            <div class="message"> <span>مسموح فقط بالارقام والحروف العربيه والانجليزيه</span></div>
            <form class="login" method="post" action="login.php">
                    <input type="text" id="login" class="fadeIn second login__input user" name="user" placeholder="أسم المستخدم" />
                    <input type="password" id="password" class="fadeIn third login__input pass" name="pass" placeholder="كلمة المرور" />
                <button class="fadeIn fourth login__submit" name="login" value="LOGIN" type="submit" onclick="submitForm(event)">تسجيل الدخول
                </button>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="reset.html">أستعادة كلمة المرور</a>
            </div>
        </div>
    </div>
    <script>
        function submitForm(e) {
            e.preventDefault()
            if (document.querySelector('.user').value == ''){
                document.querySelector(".message span").innerText =`برجاء ادخال اسم المستخدم`; 
                    document.querySelector(".message span").classList.add("activ");
                    return;
            }
            if (document.querySelector('.pass').value == ''){
                document.querySelector(".message span").innerText =`برجاء ادخال كلمه السر`; 
                    document.querySelector(".message span").classList.add("activ");
                    return;
            }
            var http = new XMLHttpRequest();
            http.open("POST", "login.php", true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var params =`user=${document.querySelector('.user').value}&pass=${document.querySelector('.pass').value}` 
            http.send(params);
            http.onload = function () {
                console.log(http.status)
                if(http.status==200) {
                    window.open("index.php","_self")
                }
                else if (http.status==400) {
                    document.querySelector(".message span").innerText =`لا يوجد بيانات دخول مطابقه`; 
                    document.querySelector(".message span").classList.add("activ");
                } else {
                }
            }
        }
        var regex = new RegExp("^[\u0621-\u064A0-9a-zA-Z ]*$");
        document.querySelector('.user').addEventListener('input', (event) => {
            if (regex.test(document.querySelector('.user').value)) {
                var element = document.querySelector(".message span").classList.remove("activ");
                document.querySelector('.login__submit').removeAttribute('disabled');
            } else {
                document.querySelector(".message span").innerText = 'مسموح فقط بلارقام والحروف العربيه والانجليزيه';
                var element = document.querySelector(".message span").classList.add("activ");
                document.querySelector('.login__submit').disabled = true;
            }
        })
        document.querySelector('.pass').addEventListener('input', (event) => {
            if (regex.test(document.querySelector('.pass').value)) {
                document.querySelector(".message span").classList.remove("activ");
                document.querySelector('.login__submit').removeAttribute('disabled');
            } else {
                document.querySelector(".message span").innerText = 'مسموح فقط بلارقام والحروف العربيه والانجليزيه';
                document.querySelector(".message span").classList.add("activ");
                document.querySelector('.login__submit').disabled = true;
            }
        })
    </script>
</body>
</html>