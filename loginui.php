<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body,
        html {
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Safari */
            -khtml-user-select: none;
            /* Konqueror HTML */
            -moz-user-select: none;
            /* Old versions of Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            /* Non-prefixed version, currently*/
            overflow-y: hidden;
            overflow-x: hidden;
            height: 100%;
            margin: 0;
        }

        .bg {
            background:

                linear-gradient(#e4bf69,
                    rgba(0, 13, 15, 0.301)),

                url(city.jpg);

            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
        }

        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Raleway, sans-serif;
        }


        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .screen {
            background: linear-gradient(90deg, #02154b, #1A2238);
            position: relative;
            height: 400px;
            width: 360px;
            box-shadow: 0px 0px 24px #1A2238;
        }

        .screen__content {
            z-index: 1;
            position: relative;
            height: 50%;
        }

        .screen__background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            -webkit-clip-path: inset(0 0 0 0);
            clip-path: inset(0 0 0 0);
        }

        .screen__background__shape {
            transform: rotate(45deg);
            position: absolute;
        }

        .screen__background__shape1 {
            height: 520px;
            width: 520px;
            background: #FFF;
            top: -50px;
            right: 120px;
            border-radius: 0 72px 0 0;
        }

        .screen__background__shape2 {
            height: 220px;
            width: 220px;
            background: #1A2238;
            top: -172px;
            right: 0;
            border-radius: 32px;
        }

        .screen__background__shape3 {
            height: 540px;
            width: 190px;
            background: linear-gradient(270deg, #F0C869, #F0C869);
            top: -24px;
            right: 0;
            border-radius: 32px;
        }

        .screen__background__shape4 {
            height: 400px;
            width: 200px;
            background: #7E7BB9;
            top: 420px;
            right: 50px;
            border-radius: 60px;
        }

        .login {
            width: 320px;
            padding: 30px;
            padding-top: 110px;
        }

        .login__field {
            padding: 20px 0px;
            position: relative;
        }

        .login__icon {
            position: absolute;
            top: 30px;
            color: #1A2238;
        }

        .login__input {
            border: none;
            border-bottom: 2px solid #D1D1D4;
            background: none;
            padding: 10px;
            font-size: 18px;
            font-weight: 700;
            width: 75%;
            transition: .2s;

        }

        .login__input:active,
        .login__input:focus,
        .login__input:hover {
            outline: none;
            border-bottom-color: #1A2238;
        }

        .login__submit {
            font-size: 26px;
            background: #fff;
            font-size: 14px;
            margin-top: 30px;
            padding: 16px 90px;
            border-radius: 26px;
            border: 1px solid #D4D3E8;
            text-transform: uppercase;
            font-weight: 700;
            display: flex;
            align-items: center;
            width: 100%;
            color: #1A2238;
            box-shadow: 0px 2px 2px #1A2238;
            cursor: pointer;
            transition: .2s;
            text-align: center;
        }

        .login__submit:active,
        .login__submit:focus,
        .login__submit:hover {
            border-color: #1A2238;
            outline: none;
        }

        .button__icon {
            font-size: 26px;
            margin-left: auto;
            color: #1A2238;
        }

        .message {
            position: absolute;

            right: 20vw;
            top: 20px;
        }

        .message span {
            display: none;
        }

        .message span.activ {
            display: inline;
            color: rgb(226, 53, 53);
            font-size: 20px;
        }
    </style>
</head>

<body>

    <div class="container bg">
        <div class="message"> <span>مسموح فقط بلارقام والحروف العربيه والانجليزيه</span></div>

        <div class="screen">
            <div class="screen__content">

                <form class="login" method="post" action="login.php">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input dir="rtl" type="text" class="login__input user" placeholder="اسم المستخدم" name="user">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input dir="rtl" type="password" class="login__input pass" placeholder="كلمه السر" name="pass">
                    </div>
                    <button class="button login__submit" name="login" value="LOGIN" type="submit"
                        onclick="submitForm(event)">
                        <span class="button__text">تسجيل الدخول</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
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
               // console.log(http.responseText=='success')
                if(http.status==200) {
                    //window.open("index.php","_self")
                    header("Location:index.php");
                }
                else if (http.status==400) {
                    document.querySelector(".message span").innerText =`لا يوجد بيانات دخول مطابقه`; 
                    document.querySelector(".message span").classList.add("activ");
                } else {
                    
                }
                //alert(http.responseText);
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