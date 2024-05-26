<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script src="https://use.fontawesome.com/c4ab1be978.js"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
        /* Fonts Form Google Font ::- https://fonts.google.com/  -:: */
        @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

        /* Start Global rules */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* Start body rules */
        body {
            background-color: #011627;

            font-family: 'Lato', sans-serif;
            opacity: .95;
        }

        /* Start form attributes */
        form {
            width: 450px;
            min-height: 500px;
            height: auto;
            border-radius: 5px;
            margin: 2% auto;
            box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
            padding: 2%;
            background-color: #2EC4B6;
        }

        /* form Container */
        form .con {
            display: -webkit-flex;
            display: flex;
        
            -webkit-justify-content: space-around;
            justify-content: space-around;
        
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
        
            margin: 0 auto;
        }

        /* the header form */
        header {
            margin: 2% auto 10% auto;
            text-align: center;
        }

        /* Register title form */
        header h2 {
            font-size: 250%;
            font-family: 'Oswald', sans-serif;
            color: #3e403f;
        }

        /*  A welcome message */
        header p {letter-spacing: 0.05em;}

        .input-item {
            background: #fff;
            color: #333;
            padding: 16px 0px 16.5px 10px;
            border-radius: 5px 0px 0px 5px;
        }

        /* Show/hide password Font Icon */
        #eye {
            background: #fff;
            color: #333;
        
            margin: 5.9px 0 0 0;
            margin-left: -20px;
            padding: 15px 9px 19px 0px;
            border-radius: 0px 5px 5px 0px;
        
            float: right;
            position: relative;
            right: 1%;
            top: -.2%;
            z-index: 5;
            
            cursor: pointer;
        }

        /* inputs form  */
        input[class="form-input"]{
            width: 290px;
            height: 50px;
        
            margin-top: 2%;
            padding: 15px;
            
            font-size: 16px;
            font-family: 'Lato', sans-serif;
            color: #5E6472;
        
            outline: none;
            border: none;
        
            border-radius: 0px 5px 5px 0px;
            transition: 0.2s linear;
            
        }

        input[id="txt-input"] {
            width: 290px;
        }

        /* focus  */
        input:focus {
            transform: translateX(-2px);
            border-radius: 5px;
        }

        /* buttons  */
        button {
            display: inline-block;
            color: #252537;
        
            width: 320px;
            height: 50px;
        
            padding: 0 20px;
            background: #fff;
            border-radius: 5px;
            
            outline: none;
            border: none;
        
            cursor: pointer;
            text-align: center;
            transition: all 0.2s linear;
            
            margin: 7% auto;
            letter-spacing: 0.05em;
        }

        /* Submits */
        .submits {
            width: 100%;
            display: inline-block;
            float: left;
            margin-left: 2%;
        }

        /* buttons hover */
        button:hover {
            transform: translatey(3px);
            box-shadow: none;
        }

        /* buttons hover Animation */
        button:hover {
            animation: ani9 0.4s ease-in-out infinite alternate;
        }
        @keyframes ani9 {
            0% {
                transform: translateY(3px);
            }
            100% {
                transform: translateY(5px);
            }
        }
    </style>
</head>
<body>
    <form method=POST>
    <div class="overlay">
        <div class="con">
            <!--     Start  header Content  -->
            <header class="head-form">
                <h2>Register</h2>
                <p>Register your account</p>
            </header>
            <!--     End  header Content  -->
            <br>
            <div class="field-set">
                <!--   username -->
                <span class="input-item">
                    <i class="fa fa-user"></i>
                </span>
                <input class="form-input" id="txt-input" type="text" placeholder="username" name="id_user" required>
                
                <br>

                <!-- nama lengkap -->
                <span class="input-item">
                    <i class="fa fa-pencil"></i>
                </span>
                <input class="form-input" id="txt-input" type="text" placeholder="nama lengkap" name="nama_user" required>
                
                <br>
                
                <!--   Password -->
                <span class="input-item">
                    <i class="fa fa-key"></i>
                </span>
                <input class="form-input" type="password" placeholder="password" id="pwd" name="password" required>
                
                <!--      Show/hide password  -->
                <span>
                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                </span>
                
                <br>

                <!--      button Register -->
                <button class="form-input" name="register"> Register </button>
            </div>
            
            <div class="other">
            <!--     Login button -->
                <button class="btn submits sign-up"><a href="login.php">Login</a></button>
            </div>
        </div>
    </div>
    </form>

<?php                    
    include './config/konfigurasi-umum.php';
    include './config/koneksi-db.php';

        if (isset($_POST['register'])) {
            $id_user=$_POST["username"];
            $password=$_POST["password"];

            $ambil = $con->query("SELECT * FROM admin WHERE username ='$username'");
            $cocok = $ambil->num_rows;            

            if ($cocok==1) {
                echo "<script>alert('Akun sudah terdaftar, gunakan username lain');</script>";
                echo "<script>location='register.php';</script>";
            }
            else {
                $con->query("INSERT INTO admin(username, password) 
                VALUES ('$username', $password')");
                echo "<script>alert('silahkan login');</script>";
                echo "<script>location='login.php';</script>";
            }     
        }
    ?>

    <script>
        // https://stackoverflow.com/questions/31224651/show-hide-password-onclick-of-button-using-javascript-only

        function show() {
            var p = document.getElementById('pwd');
            p.setAttribute('type', 'text');
        }

        function hide() {
            var p = document.getElementById('pwd');
            p.setAttribute('type', 'password');
        }

        var pwShown = 0;

        document.getElementById("eye").addEventListener("click", function () {
            if (pwShown == 0) {
                pwShown = 1;
                show();
            } else {
                pwShown = 0;
                hide();
            }
        }, false);
    </script>
</body>
